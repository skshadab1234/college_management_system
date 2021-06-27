<?php
require 'studets_resuse_files/header.php';

if (isset($_GET['quiz_id']) && $_GET['quiz_id'] != '' && isset($_GET['date']) && $_GET['date'] != '' && isset($_GET['topic']) && $_GET['topic'] != '' && isset($_GET['startTime']) && $_GET['startTime'] != '')
{
    $subject_name = get_safe_value($_GET['quiz_id']);
    $date = get_safe_value($_GET['date']);
    $topic = get_safe_value($_GET['topic']);
    $startTime = get_safe_value($_GET['startTime']);
    $qid = get_safe_value($_GET['question_id']);
}

?>

<style type="text/css">
        :root {
          --color-black: #343434;
          --color-white: #fff;
          --color-blue-dark: #1d355d;
          --color-pink: #ff5161;
          --color-yelow: #ffda62;
          --font-sans-serif: "Source Sans Pro", sans-serif;
        }


        /* Quiz
        -------------------------*/

        .quiz-container {
          background: var(--color-white);
          width: 100%;
          margin: 1rem;
          border-radius: 4px;
        }

        .quiz-header {
          display: flex;
          align-items: center;
          justify-content: space-between;
        }

        .quiz-question {
          margin-bottom: 3.2rem;
          padding-bottom: 3.2rem;
          border-bottom: 1px solid #eee;
        }

        .quiz-question:last-of-type {
          margin-bottom: 2.2rem;
        }

        .quiz-question p {
          font-weight: 600;
          margin-bottom: 1.2rem;
        }

        .quiz-results {
          display: none;
          font-size: 1.8rem;
        }

        .form-check {
          margin-bottom: 0.6rem;
        }

        .form-check label {
          margin-left: 1rem;
        }

        button {
          background: var(--color-blue-dark);
          color: var(--color-white);
          cursor: pointer;
          font-family: var(--font-sans-serif);
          font-size: 1rem;
          padding: 1.2rem 2rem;
          border: none;
          border-radius: 4px;
        }

        input[type="radio"] {
          cursor: pointer;
        }


        /* Accessibility
        -------------------------*/

        .visually-hidden {
          position: absolute !important;
          height: 1px;
          width: 1px;
          overflow: hidden;
          clip: rect(1px 1px 1px 1px);
          clip: rect(1px, 1px, 1px, 1px);
          white-space: nowrap;
        }

</style>
<div class="app-main__outer">
	<div class="app-main__inner">
	     <div class="alert alert-warning fade show" role="alert">
			<h4 class="alert-heading">Get Ready</h4>
	        <p>Be on time quiz wll end at 11:59:59 pm. So don't waste time just complete quiz on time. if you fail to submit the quiz then you only be responsible for that college will not responsible.</p>
	    </div>

	    <div class="main-card mb-3 card">
	    	<div class="card-header pl-3 mt-3" style="position: relative;">
	    		<div class="container-fluid">
	    			<div class="row">
		    			<div class="col-sm-8 col-md-8 text-left">
				    		<h5 class="card-title"><?=$subject_name . ' (' . $topic . ')' ?></h5>
		    			</div>
		    			<div class="col-sm-4 col-md-4 text-right">
				    		<h5 class="card-title" >Start Time : <?=date('h:i a', strtotime($startTime)) ?></h5>
		    			</div>
		    		</div>
	    		</div>
	    	</div>
              <div class="card-body">

             <section class="quiz-container">
             	<div class="row ">
       				<div class="col-sm-12 col-md-12 col-lg-8">
       					      		
						<?php
$current_time = date("Y-m-d h:i a");
$quiz_start_time = '2021-04-24 09:00 am';

if ($date == date('Y-m-d'))
{
    // date('h:i a', strtotime($startTime))
    if (strtotime($current_time) >= strtotime($quiz_start_time))
    {
        $quiz_sql = "SELECT * FROM `quiz_student_answer` WHERE quiz_student_Admit_No = " . $student_login['Admission_NO'] . "  && quiz_date = '$date' && subject_name = '$subject_name'";
        $quiz_answer = mysqli_query($con, $quiz_sql);
        $quiz_answer_row = mysqli_fetch_assoc($quiz_answer);

        if (mysqli_num_rows($quiz_answer) > 0)
        {
?>

		<div class="mr-3" style="border:1px solid #ddd;padding: 10px;width: 250px;">
			<?php
            $marks_get = marks_get($student_login['Admission_NO'], $subject_name, $date);
?>
			<h5 style="color: #d1d1d1;font-size: 1rem">Total Score :</h5>
			<h1 style="color: <?=$marks_get['color'] ?>"><?=$marks_get['value'] . ' / ' . totalmarksQuestion(Subject_id($subject_name) , $date,$topic); ?></h1>

			<p class="alert alert-<?=$marks_get['message_color'] ?>"><?=$marks_get['message'] ?></p>
		</div>
													<?php
            $question_echo = "SELECT *,quiz_question.id as question_id_today FROM `quiz_question` LEFT JOIN subject ON subject.id = quiz_question.subject_name where subject.subject_name = '$subject_name' && quiz_topic='$topic' &&  quiz_date = '$date' && quiz_question.status = '1'";
            $question_echo_res = mysqli_query($con, $question_echo);
            if (mysqli_num_rows($question_echo_res))
            {
                foreach ($question_echo_res as $key => $question_echo_value)
                {

                    $l = 1;

                    $ansid = $key + 1;
?>

										<!-- queston printed -->
									    
									    <p class="card-header"><?php echo "Q" . $ansid . " : " . $question_echo_value['question_name']; ?> </p><br>
										<?php
                    $sql = "SELECT * FROM `quiz_choices` WHERE `question_id` = " . $question_echo_value['question_id_today'] . "";
                    $quiz_choices = mysqli_query($con, $sql);
                    foreach ($quiz_choices as $key => $quiz_choices_value)
                    {
                        $quiz_sql = "SELECT * FROM `quiz_student_answer` WHERE quiz_student_Admit_No = " . $student_login['Admission_NO'] . " && quiz_question_id = " . $question_echo_value['question_id_today'] . " && quiz_date = '$date' && subject_name = '$subject_name'";
                        $quiz_answer = mysqli_query($con, $quiz_sql);
                        $quiz_answer_row = mysqli_fetch_assoc($quiz_answer);

                        if (mysqli_num_rows($quiz_answer) > 0)
                        {
                            if ($quiz_choices_value['correct_answer'] == $quiz_choices_value['choices'])
                            {
                                $color = 'green';
                                $checked = 'checked';
                            }
                            elseif ($quiz_answer_row['quiz_student_answer'] == $quiz_choices_value['choices'])
                            {
                                $color = 'red';
                                $checked = 'checked';
                            }
                            else
                            {
                                $color = '';
                                $checked = '';
                            }
                        }
                        else
                        {
                            $color = '';
                            $checked = '';
                        }
?>
										 		<div class="form-check">
								                  <input type="radio" disabled="" <?=$checked ?>>
								                  <label style="color: <?=$color ?>"><?php echo $quiz_choices_value['choices']; ?> </label>
								               </div>  
										 	<?php
                    }
                    $ansid = $ansid + $l;
                }

            }
            else
            {

?>
									    <p class="card-header"> No Quiz Found</p><br>
									<?php
            }
        }
        else
        {
?>
													    <!-- Quiz form -->
											      <form class="quiz-form" autocomplete="off" method="post" action="" id="quizformSubmit">
											         <?php

            $totalques =  numberofquestonpersubjectQuiz($subject_name, $date, $topic) ['numberofquestonpersubjectQuiz'];

                $sql1 = "SELECT *,quiz_question.id as question_id_today FROM `quiz_question` LEFT JOIN subject ON subject.id = quiz_question.subject_name  where subject.subject_name = '$subject_name' && quiz_date = '$date' && quiz_topic = '$topic' && quiz_question.status = '1'";
                $result1 = mysqli_query($con, $sql1);

                if (mysqli_num_rows($result1) > 0)
                {
                    while ($row1 = mysqli_fetch_assoc($result1))
                    {
?>          
											                     <p class="card-header">  <?php echo $row1['question_name']; ?> </p>

											                  <br>
											                    
											                     <?php
                        $sql = "SELECT * FROM `quiz_choices` WHERE `question_id` = " . $row1['question_id_today'] . "";
                        $result = mysqli_query($con, $sql);
                        if (mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {

?> 
											                      
											                      <div class="form-check">
																	<input type="hidden"  name="subject_name" value="<?=$subject_name
?>">										                  <input type="hidden" name="question_id" value="<?=$row1['question_id_today'] ?>">
                                                            <input type="hidden" name="quiz_topic" value="<?=$row1['quiz_topic'] ?>">
												                  <input type="radio" id="<?php echo $row['id'] . $row['choices']; ?>" name="quizcheck[<?php echo $row1['question_id_today']; ?>]"  value="<?php echo $row['choices']; ?>" required >
												                  <label for="<?php echo $row['id'] . $row['choices']; ?>"><?php echo $row['choices']; ?> </label>
												               </div>     
											                     <?php
                            }
                        }
                    }
                }

?>
											            <button type="submit" name="submit">Show results</button>
											      </form>
									      		<!-- end quiz -->
								                  <?php
        }
    }
    else
    {
?>
								                  <div class="container-fluid text-center">
								                           <h3 class="text-center" >Quiz will start at <?=$quiz_start_time ?></h3>
								                  </div>
								                  <?php
    }

}
elseif ($date > date('Y-m-d'))
{
    echo "not created for " . $date;
}
elseif ($date < date("Y-m-d"))
{

    // <!-- ye date nikal chuki hai means quiz time end up -->
    // 	<!-- Quiz form -->
    $question_echo = "SELECT *,quiz_question.id as question_id_today FROM `quiz_question`  where subject_name = '$subject_name' && quiz_date = '$date' && quiz_question.status = '1'";
    $question_echo_res = mysqli_query($con, $question_echo);

    if (mysqli_num_rows($question_echo_res))
    {
?>
										<div class="mr-3" style="border:1px solid #ddd;padding: 10px;width: 250px;">
											<?php
        $marks_get = marks_get($student_login['Admission_NO'], $subject_name, $date);
?>
											<h5 style="color: #d1d1d1;font-size: 1rem">Total Score :</h5>
											<h1 style="color: <?=$marks_get['color'] ?>"><?=$marks_get['value'] . ' / ' . totalmarksQuestion($subject_name, $date); ?></h1>

											<p class="alert alert-<?=$marks_get['message_color'] ?>"><?=$marks_get['message'] ?></p>
										</div>
									<?php
        foreach ($question_echo_res as $key => $question_echo_value)
        {

            $l = 1;

            $ansid = $key + 1;
?>

										<!-- queston printed -->
									    
									    <p class="card-header"><?php echo $question_echo_value['question_name']; ?> </p><br>
										<?php
            $sql = "SELECT * FROM `quiz_choices` WHERE `question_id` = " . $question_echo_value['id'] . "";
            $quiz_choices = mysqli_query($con, $sql);
            foreach ($quiz_choices as $key => $quiz_choices_value)
            {
                $quiz_sql = "SELECT * FROM `quiz_student_answer` WHERE quiz_student_Admit_No = " . $student_login['Admission_NO'] . " && quiz_question_id = " . $question_echo_value['id'] . " && quiz_date = '$date' && subject_name = '$subject_name'";
                $quiz_answer = mysqli_query($con, $quiz_sql);
                $quiz_answer_row = mysqli_fetch_assoc($quiz_answer);

                if (mysqli_num_rows($quiz_answer) > 0)
                {
                    if ($quiz_choices_value['correct_answer'] == $quiz_choices_value['choices'])
                    {
                        $color = 'green';
                        $checked = 'checked';
                    }
                    elseif ($quiz_answer_row['quiz_student_answer'] == $quiz_choices_value['choices'])
                    {
                        $color = 'red';
                        $checked = 'checked';
                    }
                    else
                    {
                        $color = '';
                        $checked = '';
                    }
                }
                else
                {
                    $color = '';
                    $checked = '';
                }
?>
										 		<div class="form-check">
								                  <input type="radio" disabled="" <?=$checked ?>>
								                  <label style="color: <?=$color ?>"><?php echo $quiz_choices_value['choices']; ?> </label>
								               </div>  
										 	<?php
            }
            $ansid = $ansid + $l;
        }

    }
    else
    {

?>
									    <p class="card-header"> No Quiz Found</p><br>
									<?php
    }

}
?>
       				</div>	
       				
             	</div>

			</section>

              </div>

         </div>     

<script type="text/javascript">
	$(document).ready( () => {
		
		$("#quizformSubmit").submit( function(e) {
			
			var serialize_data = $(this).serialize();

			$.ajax({
				url: "quiz_checked.php",
				method: "post",
				data: serialize_data,
				success: function(data){
					$("#quizformSubmit").html(data);
				}
			});
			e.preventDefault();
		})
	});
</script>

<?php
require 'studets_resuse_files/footer.php';
?>
