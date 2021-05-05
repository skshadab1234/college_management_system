<?php
   require 'studets_resuse_files/header.php';

?>
<style>
	.strock::before{
		left: 100px;
	}
	.vertical-timeline-element-content .vertical-timeline-element-date{
		left: -130px
	}
	.vertical-timeline-element-icon{
		left: 93px;
	}
	.vertical-timeline--animate .vertical-timeline-element-content.bounce-in{
		margin-left: 130px
	}
</style>
<!-- main section -->
<div class="app-main__outer">
<div class="app-main__inner">
<div class="main-card mb-3 card">
<div class="card-body">
<h5 class="card-title">Notice Board</h5>
<div class="vertical-timeline vertical-timeline--animate vertical-timeline--one-column strock" >
<?php
	$getNotice =  array_filter(getNotice("1"));
	foreach ($getNotice as $key => $value) {
		$link =  $value['college_notice_link'];
		if ($link == '') {
			$link = 'javascript:void(0)';
		}
		?>
			<div class="vertical-timeline-item vertical-timeline-element">
			    <div>
			        <span class="vertical-timeline-element-icon bounce-in">
			            <i class="badge badge-dot badge-dot-xl badge-success"> </i>
			        </span>
			       
			        <div class="vertical-timeline-element-content bounce-in">
			            <a href="<?= $link ?>">
			            	<p><b><?= $value['college_notice_title'] ?></b></p>
			            	<p><?= $value['college_notice_short_desc'] ?></p>
			            	<p><strong>Category:- </strong> <?= $value['branch_name'] ?></p>
			            </a>
			            <span class="vertical-timeline-element-date"><?= times_ago($value['college_notice_date']) ?></span>
			        </div>
			        
			    </div>
			</div>
		<?php
	}
?>

</div>
</div>
</div>
</div>

<?php
require 'studets_resuse_files/footer.php';

?>  