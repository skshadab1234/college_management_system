<?php

function prx($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
	die();
}

function pr($value)
{
	echo "<pre>";
	print_r($value);
	echo "</pre>";
}

function get_safe_value($str){
    global $con;
    $str=mysqli_real_escape_string($con,$str);
    return $str;

}


function redirect($link){
	?>
	<script>
		window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}


function student_fees_details($admission_no){
	global $con;
	$arr=array();
	$res=mysqli_query($con,"select * from student_fees_details where Admission_No='$admission_no'");
	while($row=mysqli_fetch_assoc($res)){
		$arr[]=$row;
		// total fees
		$arr[0]['total_fees_percentage'] = '100%';

		// calculating percentage of remain fees from total fees
		$total_fees = $row['Total_fees'];
		$paid_fees = $row['Paid_Fees'];

		$paid_percentage = ($total_fees - $paid_fees) / $total_fees * 100;
		$arr[0]['remain_fees_percentage'] = number_format($paid_percentage,2);

		if (50 < number_format($paid_percentage)) {
			$arr[0]['paid_percentage_color_impression'] = 'danger';
		}else{
			$arr[0]['paid_percentage_color_impression'] = 'success';
		}

		// calculating paid fess percentage from total fees
		$total_fees = $row['Total_fees'];
		$remain_fees = $row['Balance_Fees'];

		$remain_percentage = ($total_fees - $remain_fees) / $total_fees * 100;
		$arr[0]['paid_fees_percentage'] = number_format($remain_percentage,2);

		if ($remain_percentage <= 50) {
			$arr[0]['remain_percentage_color_impression'] = 'success';
		}else{
			$arr[0]['remain_percentage_color_impression'] = 'danger';
		}



	}
	return $arr;
}