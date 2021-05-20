<?php
	// $video_url = '';
	// if(!empty($form_data['tutorial']['tutorial_video']))
	// 	$video_url = get_image($form_data['tutorial']['tutorial_video'],$form_data['tutorial']['tutorial_video_path']);
?>

<?php
	$video_url = '';
	if(!empty($form_data['tutorial']['tutorial_video']))
		$video_url = g('db.admin.bucket') . $form_data['tutorial']['tutorial_video'];
?>
<div class="form-body">

<script type="text/javascript">
BASE_URL = "<?php echo base_url();?>";
</script>


<div id="container">
<!-- <h1>CodeIgniter Plupload Chunk Uploading</h1>-->
<div id="body">
<!-- <p>Upload Big file chunk by chunk using Plupload.</p> -->

<div id="filelist">Your browser doesn’t have Flashs, Silverlight or HTML5 support.</div>
<div id="container">
<div class="form-group">
<a id="uploadFile" name="uploadFile" href="javascript:;"><i class="fa fa-link" aria-hidden="true"></i>
Select file</a>
</div>

<div class="form-group">
<a id="upload" href="javascript:;" class="btn btn-danger">Upload files</a>
</div>
</div>
<input type="hidden" id="file_ext" name="file_ext" value="<?=substr( md5( rand(10,100) ) , 0 ,10 )?>">

<div id="console"></div>
</div>

<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
<p class="footer">Movie Extension allow : mp4,ogg,webm</p>
</div>

<!-- <script type="text/javascript" src="https://www.plupload.com/plupload/js/plupload.full.min.js" charset="UTF-8"></script> -->

<? if(!empty($video_url)) :?>
<video src="<?=$video_url?>" width="50%" controls></video>
<? endif;?>

</div>

