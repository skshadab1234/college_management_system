	
<?php

require 'session.php';
$html = '';
if (isset($_POST['admit_no']) && $_POST['admit_no'] != '') {
	$incoming_id = get_safe_value($_POST['admit_no']);
	$res= mysqli_query($con,"SELECT * FROM `chat_messages` WHERE incoming_id = '$incoming_id' and outgoing_id = ".$student_login['Admission_NO']." UNION SELECT * FROM chat_messages WHERE incoming_id= ".$student_login['Admission_NO']." and outgoing_id='$incoming_id' ORDER BY id ASC");

	$chat_profile_name = mysqli_query($con,"SELECT * FROM student_login WHERE Admission_NO = '$incoming_id'");
	$chat_profile_name_row =  mysqli_fetch_assoc($chat_profile_name);
	
	$html .= '<div class="chat-area-header">
             <div class="chat-area-title">'.$chat_profile_name_row['firstname'].' '.$chat_profile_name_row['last_name'].'</div>
          </div>';
	while ($row = mysqli_fetch_assoc($res)){
		if ($row['outgoing_id'] == $student_login['Admission_NO']) {
			$owner = 'owner';
	 		if ($row['messeage_seen_time'] == '') {
		 		$mark =  '<i class="fas fa-check" ></i>';
	 		}else{
	 			$mark =  '<i class="fas fa-check-double" style="color:steelblue"></i>';
	 		}
		}else{
			$owner = '';
			$mark = '';
		}
	 	

	 	if ($row['status'] == 1) {
	 		$messages = $row['messages'];
	 	}else{
	 		$messages = 'This Message has been deleted';
	 	}

	 	if (date("Y-m-d") == date('Y-m-d', strtotime($row['message_send_time']))) {
	 		$send_time = date('h:i A', strtotime($row['message_send_time']));
	 	}else{
	 		$send_time = date('d M, Y h:i A', strtotime($row['message_send_time']));
	 	}
		$html .= '
             <div class="chat-msg '.$owner.'">
               <div class="chat-msg-profile">
                  <div class="chat-msg-date">'.$send_time.'<span style="margin-left:10px;" >'.$mark.'</span></div>
               </div>
               <div class="chat-msg-content">
                  <div class="chat-msg-text">'.$messages.' </div>
               </div>
              </div> 
            
         ';
	}
	$html .= '<div class="append_data"></div>';
	$html .= '<div class="chat-area-footer">
            <form method="post" id="send_message">
				<input type="hidden" value="'.$incoming_id.'"  id="incoming_id" name="incoming_id" />
            	<input type="text" placeholder="Type something here..." name="send_message" id="add_msg" />
            	<input type="submit" style="display:none" />
            </form>
         </div>
      </div>
     
   </div></div>';
	echo $html;
?>
	
<script>
      $(document).ready( () =>{
         jQuery('#send_message').submit(function(e){
            var send_message = $(this).serialize();
            $.ajax({
               url:"chat_request.php",
               method:"post",
               data:send_message,
               success:function(data) {
               	var data = $.parseJSON(data);
               	var now = new Date(Date.now());
               	var hours = now.getHours() % 12 || 12;  
            	var formatted = moment().format('hh:mm A');
                  $("#add_msg").val('');
                  $(".append_data").append('<div class="chat-msg owner"><div class="chat-msg-profile"><div class="chat-msg-date"><span style="margin-left:10px;">'+formatted+'</span></div></div><div class="chat-msg-content"><div class="chat-msg-text">'+data.send_message+'</div></div></div> ');
               }
            })

            e.preventDefault();     

         })

         
      });
   </script>

<?php
}elseif (isset($_POST['send_message']) && $_POST['send_message'] != '' && isset($_POST['incoming_id']) && $_POST['incoming_id'] != '') {
	$send_message = get_safe_value($_POST['send_message']);
	$incoming_id = get_safe_value($_POST['incoming_id']);

	$res = mysqli_query($con,"INSERT INTO `chat_messages`(`incoming_id`, `outgoing_id`, `messages`, `message_send_time`,`status`) VALUES ('$incoming_id',".$student_login['Admission_NO'].",'$send_message','".date("Y-m-d h:i a")."',1)");

	$arr = array('send_message'=>$send_message,'incoming_id'=>$incoming_id);
	echo json_encode($arr);
}


?>
