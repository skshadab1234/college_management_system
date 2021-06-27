<?php
require 'admin_resuse_files/header.php';
include ('../smtp/PHPMailerAutoload.php');
?>

<div class="app-main__outer">
<div class="app-main__inner" >
	<div class="app-page-title">
      <div class="page-title-wrapper">
         <div class="page-title-heading">
            <div>
               <strong>Fees Details</strong>
               
            </div>
         </div>
         <div class="page-title-actions">
            <a href="?send_email=send_email" class="btn btn-primary"> Send Email</a>
         </div>
      </div>
   </div>
 					
	<?php
		$result_branch = mysqli_query($con,"SELECT * FROM branch");
		if (mysqli_num_rows($result_branch) > 0) {
			while ($branch_row = mysqli_fetch_assoc($result_branch)) {
				?>
					<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-study icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div><?= $branch_row['branch_name'] ?>
                                </div>
									
                            </div>
                         </div>
                    </div>
 					
                    <div class="main-card mb-3 card" >
                            <div class="card-body">
                                <table style="width: 100%;" class="table table-hover text-center table-striped table-bordered"><thead>                                    
									<tr>
                                        <th>Sr.No</th>
                                        <th>Student Name / Enroll</th>
                                        <th>Fees Details</th>
                                    </tr>
                                 </thead>
                                  <tbody id="dump_courses_here">
                                  	<?php
                                  	$res = mysqli_query($con,"SELECT * FROM student_login WHERE BRANCH=".$branch_row['id']."");

									if (mysqli_num_rows($res) >0) {
										foreach ($res as $key => $row) {
											$fees_res=mysqli_query($con,"select * from student_fees_details where Admission_No=".$row['Admission_NO']."");
											
											?><tr>
					                                <td><?= $key+=1 ?></td>
					                                <td><a href="student_details?id=<?= $row['id'] ?>"><?= $row['firstname'].' '.$row['last_name'].' / '.$row['enroll_no']?></a></td>
					                                <td>
											
											<table style="width: 100%;" class="table text-center table-striped table-bordered">
												

										<?php
											if (mysqli_num_rows($fees_res)>0) {
												?>
											<thead>
													<tr>
														<th>Installment No</th>
														<th>Total Amount Pay</th>
														<th>Amount Paid</th>
														<th>Balance Amount to pay</th>
													</tr>
												</thead>
												<tbody>
												<?php
												foreach ($fees_res as $key => $fees_row) {
												$total_paid=mysqli_query($con,"select SUM(Paid_Fees) as tpaid from student_fees_details where Admission_No=".$row['Admission_NO']."");	
											$total_paid_row = mysqli_fetch_assoc($total_paid);	
											$tpaid_percent  = $total_paid_row['tpaid'] / $fees_row['Total_fees'] * 100;
											$tpaid_percent_floor =  floor($tpaid_percent);
											
											?>
													<tr>
														<td><?= $key+=1 ?></td>
														<td><?= 'Rs '.number_format($fees_row['Total_fees']) ?></td>
														<td><?= 'Rs '.number_format($fees_row['Paid_Fees']) ?></td>
														<td><?= 'Rs '.number_format($fees_row['Balance_Fees']) ?></td>
													</tr>
				                          	<?php
					                         }
					                         // cbc
					                         if ($tpaid_percent_floor < 50) {
					                         	$html = '
					                    <!doctype html>
										<html lang="en-US">

										<head>
										<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
										<meta name="description" content="Reset Password Email Template.">
										<style type="text/css">
										a:hover {
										text-decoration: underline !important;
										}
										</style>
										</head>

										<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
										<!--100% body table-->
										<table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: " Open Sans ", sans-serif;">
										<tr>
										  <td>
										    <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
										      <tr>
										        <td style="height:80px;">&nbsp;</td>
										      </tr>
										      <tr>
										        <td style="height:20px;">&nbsp;</td>
										      </tr>
										      <tr>
										        <td>
										          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
										            <tr>
										              <td style="height:40px;">&nbsp;</td>
										            </tr>
										            <tr>
										              <td style="padding:0 35px;">
										                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:" Rubik ",sans-serif;">Pay Your Fees</h1> <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
										               
										               <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:24px;font-family:" Rubik ",sans-serif;">Thank You From Admin</h1>
										            </tr>
										            <tr>
										              <td style="height:40px;">&nbsp;</td>
										            </tr>
										          </table>
										        </td>
										        <tr>
										          <td style="height:20px;">&nbsp;</td>
										        </tr>
										        <tr>
										          <td style="height:80px;">&nbsp;</td>
										        </tr>
										    </table>
										  </td>
										  </tr>
										</table>
										<!--/100% body table-->
										</body>

										</html>';
											if (isset($_GET['send_email']) && $_GET['send_email'] != '') {
												if (date('D') == 'Mon') {
													send_email($row['student_email'],$html,'Pay Your Fees','');
												}
												redirect('students_fees'.PHP_EXT);
											}
													
											}
					                         }else{
					                         	echo "No Record found";
					                         } 
					                        ?>
					                        </tbody>
										</table>
				                                </td>
					                            </tr>
											<?php
								                         
										}
									}
                                  	?>
                                  </tbody>
                              </table>
                            </div>
                    </div>
                    <hr>
				<?php
			}
		}
	?>
<?php
require 'admin_resuse_files/footer.php';
?>
