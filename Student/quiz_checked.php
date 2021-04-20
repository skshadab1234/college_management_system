<?php
require 'session.php';
$html = '';

if (isset($_POST['quizcheck']) && !empty($_POST['quizcheck']))
{
    $allanswers = $_POST['quizcheck'];
    $subject_name = $_POST['subject_name'];

      for ($i = 1;$i <= numberofquestonpersubjectQuiz($_POST['subject_name'], date('Y-m-d')) ['numberofquestonpersubjectQuiz'];$i++)
            {

                $sql1 = "SELECT *,quiz_question.id as question_id_today FROM `quiz_question`  where subject_name = '$subject_name' && quiz_date = '" . date("Y-m-d") . "' && quiz_question.status = '1' && quiz_question_id = '$i'";
                $result1 = mysqli_query($con, $sql1);
                if (mysqli_num_rows($result1) > 0)
                {
                    while ($row1 = mysqli_fetch_assoc($result1))
                    {
                        $html .= '<p class="card-header"> Q '.$i.': ' . $row1['question_name'] . ' </p><br>';

                        $sql = "SELECT * FROM `quiz_choices` WHERE `question_id` = " . $row1['question_id_today'] . "";
                        $result = mysqli_query($con, $sql);
                        foreach ($result as $key => $values) 
                        {
                        	if ($values['correct_answer'] == $values['choices']) {
                        		$color ="green";
                        	}elseif ($allanswers[$i] == $values['choices']) {
                        		$color = 'red';	
                        	}else{
                        		$color = '';
                        	}
                            $html .= '<div class="form-check">
			                  <label style="color:'.$color.'">' . $values['choices']. '</label>
			               </div>';
                        }
                    }
                }
            }

}
echo $html;

