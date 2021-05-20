<?global $config;?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="<?=get_image($this->layout_data['logo']['logo_favicon'],$this->layout_data['logo']['logo_image_path'])?>">

<title><?=$title; ?></title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<?
//Put Meta Data
foreach ($meta_data AS $meta_name => $meta_val)
echo '<meta name="' . $meta_name . '" content="' . $meta_val . '">';
?>

<meta charset="<?=(isset($meta_charset)) ? $meta_charset : "UTF-8" ?>">

<?foreach($css_files AS $file){?>
  <link rel="stylesheet" href="<?=$config['css_root'] . $file; ?>" type="text/css" />
<?}?>

<?
if(array_filled($js_files_init)) {
  foreach ($js_files_init as $js) {?>
    <script src="<?=g('js_root').$js?>"></script> 
  <?
  }
}
?>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>

  <?=$content_block; ?>

</body>


<!-- BEGIN PAGE LEVEL SCRIPTS -->
<!-- js placed at the end of the document so the pages load faster -->
<?foreach($js_files AS $file){
?>
<script src="<?=$config['js_root'] . $file; ?>"></script>
<?
}?>
<!-- END PAGE LEVEL SCRIPTS -->

<? /*    
  <!-- [Recaptcha Start] -->
  <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
  <!-- [Recaptcha END] -->
  <script type="text/javascript">
  var CaptchaCallback = function() {
    grecaptcha.render('RecaptchaField1', {'sitekey' : '<?=g('google_captcha.0')?>'});
   // grecaptcha.render('RecaptchaField2', {'sitekey' : '6Ld0rDUUAAAAAAiLxRygnLpkSHEag8D_KGRrxPmP'});
    // grecaptcha.render('RecaptchaField3', {'sitekey' : '6LctgiYUAAAAAPIJ1Dek4QWVvIDVXlQhqFqluxyY'});
  };
  </script>
*/
  ?>



</html>