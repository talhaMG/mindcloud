<?global $config;
// $this->layout_data['additional_tools'];

  $my_tools = array(
            "datatables-front" => array(
                  "css" => array("responsive.bootstrap4.min.css",'dataTables.bootstrap4.min.css'),
                  "js" => array(
                    'jquery.dataTables.min.js',
                    'dataTables.bootstrap4.min.js',
                    "dataTables.responsive.min.js",
                    "responsive.bootstrap4.min.js",
                    "script.js"
                  ),
            ),
            
            "chosen" => array(
              "js" => array("chosen.jquery.min.js"),
              "css" => array("chosen.min.css"),
            ),
            "jquery-ui" => array(
              "css" => array('jquery-ui-1.10.3.custom.min.css'),
              "js" => array("jquery-ui-1.10.3.custom.min.js"),
            ),
            "bootstrap" => array(
              "css" => array("css/bootstrap.min.css"),
              "js" => array("js/bootstrap.min.js"),
            ),
            "jquery-nouslider" => array(
              "js"  => array("js/jquery.nouislider.all.js","js/jquery.nouislider.js"),
              "css"  => array("css/jquery.nouislider.css","css/jquery.nouislider.pips.css"),
            ),
            "bootstrap-datepicker" => array(
              "css" => array("css/datepicker.css"),
              "js" => array("js/bootstrap-datepicker.js"),
            ),

            "bootstrap-toastr"=> array(
              "css" => array("toastr.min.css"),
              "js" => array("toastr.min.js"),
            ),

            "zabuto_calendar"=> array(
              "css" => array("css/css.css"),
              "js" => array("js/zabuto_calendar.min.js"),
            ),

            "my_cart"=> array(
              'css' => array('css/cart_basket.css'),
              "js" => array("js/script.js"),
            ),

            "pretyphoto"=> array(
              'css' => array('css/prettyPhoto.css'),
              "js" => array('js/jquery.prettyPhoto.js'),
            ),

            "common_files"=> array(
              'css' => array('css/mystyle.css'),
              "js" => array('js/script.js' , 'js/forms.js'),
            ),

            "bootstrap-fileupload" => array(
              "js" => array("bootstrap-fileupload.js"), 
              "css" => array("bootstrap-fileupload.css")
            ),

            // file upload new plugin install
            "bootstrap-fileinput-master" => array(
              "js" => array("js/plugins/sortable.js","js/fileinput.js","js/fileinput_locale_fr.js",
                        "js/fileinput_locale_es.js","themes/explorer/theme.js","js/script.js"),
              "css" => array("css/fileinput.css","themes/explorer/theme.css","css/style.css"), 
            ),

            // "bootstrap-datetimepicker1" => array(
            //   "css" => array("css/css.css"),
            //   "js" => array("js/bootstrap-datetimepicker.js"),
            // ),
            "bootstrap-datetimepicker1" => array(
              "css" => array("css/datetimepicker.css"),
              "js" => array("js/datetimepicker.js"),
            ),

            "ckeditor"=> array(
              "js" => array("ckeditor.js","config.js"),
            ),

            
            "owl-carousel" => array(
              "css" => array("owl.carousel.css","owl.theme.css"),
              "js" => array("owl.carousel.js" , 'script.js'),
            ),

            "owl-carousel1" => array(
              "css" => array("owl.carousel.css","owl.theme.css"),
              "js" => array("owl.carousel.js"),
            ),

             "progress-bar" => array(
              "css" => array("style.css"),
              "js" => array("nprogress.js"),
            ),

              "preloading" => array(
              "css" => array("layout1/style.css"),
              //"js" => array("nprogress.js"),
            ),

            "CustomFileInputs" => array(
                "css" => array("css/normalize.css","css/demo.css","css/component.css",),
                "js" => array("js/custom-file-input.js"),
              ),

            "jquery-multiselect" => array(
                "css" => array("jquery.multiselect.css",),
                "js" => array("jquery.multiselect.js"),
              ),
            
            "tooltipster-master" => array(
              "js" => array("dist/js/tooltipster.bundle.min.js"), 
              "css" => array("dist/css/tooltipster.bundle.min.css")
            ),

            // "fancybox" => array(
            //   "js" => array("source/jquery.fancybox.js",'script.js'), 
            //   "css" => array("source/jquery.fancybox.css")
            // ),

            "fancybox" => array(
              "js" => array("jquery.mousewheel-3.0.6.pack.js","jquery.fancybox.pack.js"), 
              "css" => array("jquery.fancybox.css")
            ),

            "emoji"=> array(
                      'css' => array(/*'css/stylesheet.css',*/'dist/emojionearea.min.css','css/tomorrow.css'),
                      "js" => array(/*'dist/prettify.js',*/'dist/emojionearea.js'),
                    ),

         
            "wdt-emoji-bundle-master"=> array(
                      'css' => array('wdt-emoji-bundle.css'),
                      "js" => array('emoji.min.js','wdt-emoji-bundle.js'),
                    ),

            "fb"=> array(
                'css' => array('style.css'),
                "js" => array('script.js'),
              ),

            "jstar-rating" => array(
            "js" => array("js/rating.js"),
            "css" => array("css/rating.css"),
        ),


         "flag-icon-css-master" => array(
            "css" => array("assets/docs.css","css/flag-icon.css"),
            "js" => array("assets/docs.js"),
          ),

          "flag_sprites" => array(
            "css" => array("flags.css"),
          ),
           

         "owl-carousel"=>array(
            "css" => array("owl.carousel.css","owl.theme.css"),
            "js" => array("owl.carousel.js"),
          ),


         "bootstrap-star-rating-master" => array(
            "css" => array("css/star-rating.css"),
            "js" => array("js/star-rating.js"),
        ),

          "my_cart"=> array(
              'css' => array('css/cart_basket.css'),
              "js" => array("js/script.js"),
            ),


          "datatables2" => array(
              "css" => array("media/css/jquery.dataTables.css"),
              "js" => array("media/js/jquery.dataTables.js"),
            ),
          
          "datatables2" => array(
              "css" => array("media/css/jquery.dataTables.css"),
              "js" => array("media/js/jquery.dataTables.js"),
            ),

           "slick" => array(
              "css" => array("slick.css","slick-theme.css"),
              "js" => array("slick.js"),
            ),

            
          );

?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$title?> <?=isset($page_title) ? "| $page_title" : ""?></title>
<!-- [METAS TAG Start] -->
<?php 

foreach ($meta_data AS $meta_name => $meta_val){?>
<meta name="<?=$meta_name?>" content="<?=$meta_val?>">
<?}?>
<!-- [METAS TAG END] -->
<!-- [favicon Start] -->
<link rel="icon" type="image/png" sizes="16x16" href="<?=$this->layout_data['faviconlogo']?>">
<!-- [favicon End] -->

<!-- template script -->

<!-- template script -->


<?foreach($css_files AS $css){?>
  <link href="<?=g('css_root').$css?>" rel="stylesheet" type="text/css" />
<?}
if(array_filled($js_files_init)) {
  foreach ($js_files_init as $js) {?>
    <script src="<?=g('js_root').$js?>"></script> 
  <?
  }
}
?>

<?php
// Add registered plugin if needed
// include css files
if(is_array($additional_tools) && count($additional_tools))
{
  foreach($additional_tools AS $tool){
    if(is_array($my_tools[$tool]['css']))
    foreach($my_tools[$tool]['css'] AS $script)
    {
      if($script){
        ?><link rel="stylesheet" href="<?=g('plugins_root') .$tool ."/". $script; ?>"/><?
      }
      
    }
  }
}
?>

<script type="text/javascript">
// Global Veriable use in js file
  var base_url = "<?=$this->config->item('base_url')?>";
  var user_type = "<?=$this->session->userdata['logged_in_front']['user_type']?>";
</script>


</head>





<!--<body class="responsive" <?=$this->layout_data['method_name'] == "quiz" ? 'oncontextmenu="return false;" onkeydown="return false;" onmousedown="return false;"' : ''?>>-->
<body class="responsive">
  <div class="login-page"> 

  <!--[Start Loading Div]-->
  <? $this->load->view('_layout/loading/loading2')?>
  <!--[End Loading Div]-->

  <!--[Start Header]-->
  <? $this->load->view('_layout/front/_header')?>
  <!--[End Navigation]-->

  <!--[Start Page content]-->
  <?=$content_block?>
  <!--[End Page content]-->

  <!--[Start Footer]-->
  <? $this->load->view('_layout/front/_footer')?>
  <!--[End Footer]-->



  <!--[Start MODAL]-->
    <? //$this->load->view('_layout/modal/_register')?>
    <? //$this->load->view('_layout/modal/_login')?>
    <? // $this->load->view('_layout/modal/_forgot_password')?>
    <? $this->load->view('_layout/modal/_custom')?>
  <!--[End MODAL]-->
  
  <!--[START NODE SERVER]-->
  <? 
  if($this->userid > 0)
    // $this->load->view('_layout/front/_node_server');
  ?>
  <!--[END NODE SERVER]-->
  
<?php
// common use for this html
// include js files
foreach ($js_files as $js) {?>
    <script src="<?=g('js_root').$js?>"></script> 
<?php
}
?>
<!-- template javascript  -->
    
<!-- template javascript  -->

<?php
// Add registered plugin if needed
// include js files
if(array_filled($additional_tools))
{
  foreach($additional_tools AS $tool){
    if(is_array($my_tools[$tool]['js']))
    foreach($my_tools[$tool]['js'] AS $script)
    {
      $tool_activators .= "var tool_".str_replace("-","_",$tool)." = true;";
      ?>
      <script src="<?=$config['plugins_root'] .$tool."/". $script; ?>"></script>
      <?
    }
  }
}
?>

    
  <script>
    <?=$tool_activators?>
    $(document).ready(function(){
      <?if($_GET['msgtype'] && $_GET['msg']){?>
        Toastr.<?=$_GET['msgtype']?>("<?=ucfirst($_GET['msg'])?>", "" , {positionClass:"toast-bottom-right"} );
      <?}?>
    });
  </script>
  


    
<?php
/*
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


  </div>

  </body>
</html>
