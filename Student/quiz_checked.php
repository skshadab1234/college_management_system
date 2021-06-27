<?php
require 'session.php';
$html = '';

if (isset($_POST['quizcheck']) && !empty($_POST['quizcheck']))
{
    $allanswers = $_POST['quizcheck'];
    $numberofqueston = count($allanswers);
    $subject_name = $_POST['subject_name'];
    $question_id = $_POST['question_id'];
    $topic = $_POST['quiz_topic'];
    $date= date('Y-m-d');
    $marks_get = marks_get($student_login['Admission_NO'],$subject_name,date('Y-m-d'));
             
                $sql1 = "SELECT *,quiz_question.id as question_id_today FROM `quiz_question` LEFT JOIN subject ON subject.id = quiz_question.subject_name  where subject.subject_name = '$subject_name' && quiz_date = '$date' && quiz_topic = '$topic' && quiz_question.status = '1'";

                $result1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($result1) > 0)
                {
                    while ($row1 = mysqli_fetch_assoc($result1))
                    {
                        $html .= '<p class="card-header">' . $row1['question_name'] . ' </p><br>';

                        $sql = "SELECT * FROM `quiz_choices` WHERE `question_id` = " . $row1['question_id_today'] . "";
                        $result = mysqli_query($con, $sql);
                        foreach ($result as $key => $values) 
                        {

                            $marks = 0;
                            // pr($allanswers[$row1['question_id_today']]);
                            // pr($values['choices']);
                        	if ($values['correct_answer'] == $values['choices']) {
                        		$color ="green";
                        		$checked = '';
                        	}elseif ($allanswers[$row1['question_id_today']] == $values['choices']) {
                        		$color = 'red';	
                        		$checked = 'checked';
                        	}else{
                        		$color = '';
                        		$checked = '';
                        	}

                            if ($allanswers[$row1['question_id_today']] != $values['correct_answer']) {
                                $marks = $marks + 0;
                            }else{
                                $marks = $marks + $row1['question_marks'];

                            }
                            $html .= '<div class="form-check">
						                  <input type="radio" '.$checked.' name="quizcheck['.$row1['question_id_today'].']"  disabled>
						                  <label style="color:'.$color.'">' . $values['choices']. '</label>
						               </div>';
                        }

                       $res = mysqli_query($con, "SELECT * FROM quiz_student_answer WHERE quiz_student_Admit_No=".$student_login['Admission_NO']." && quiz_question_id = ".$row1['question_id_today']."");
                       
                       
                       
                       if (mysqli_num_rows($res) > 0) {

                       }else{
                            $user_answer = $allanswers[$row1['question_id_today']];
                            $res = mysqli_query($con,"INSERT INTO quiz_student_answer(quiz_student_Admit_No,quiz_question_id,quiz_student_answer,marks_get,subject_name,quiz_date) VALUES(".$student_login['Admission_NO'].",".$row1['question_id_today'].",'$user_answer',".$marks.",'$subject_name','".date('Y-m-d')."')");
                       }

                        // pr("SELECT * FROM quiz_student_answer WHERE quiz_student_Admit_No=".$student_login['Admission_NO']." && quiz_question_id = ".$row1['question_id_today']."");
                    }
                }

                
}
echo $html;

