<style type="text/css">
#uploadFile {
  background: green none repeat scroll 0 0;
  color: white;
  display: table;
  float: left;
  margin-right: 5px;
  padding: 7px 5%;
}

#filelist > li {
    background: #017ac7;
    color: white;
    list-style: outside none none;
    margin-bottom: 5px;
    padding: 3px 10px;
    width: 50%;
}



#uploadFile2 {
  background: green none repeat scroll 0 0;
  color: white;
  display: table;
  float: left;
  margin-right: 5px;
  padding: 7px 5%;
}

#filelist2 > li {
    background: #017ac7;
    color: white;
    list-style: outside none none;
    margin-bottom: 5px;
    padding: 3px 10px;
    width: 50%;
}

.position {border: 1px solid;height: 30px;padding: 5px;}
</style>

<?global $config;
$model_heads = explode("," , $dt_params['dt_headings'] );

//debug(,1);
?>
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN VALIDATION STATES-->
      <div class="tabbable tabbable-custom boxless tabbable-reversed">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tab_0" data-toggle="tab">
            <?=humanize($page_title)?> </a>
          </li>

          <?if($form_data){?>
            
          <li>
            <a href="#tab_3" data-toggle="tab">
            <?=humanize($page_title)?> Intro Video</a>
          </li>
          <?}?>
          <li>
            <a href="#tab_5" data-toggle="tab">
            <?=humanize($page_title)?> image</a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="tab_0">
            <div class="portlet box green">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-shopping-cart"></i><?=humanize($page_title)?>
                      <small>Add Details to <?=humanize($page_title)?></small>
                </div>
                <div class="tools">
                  <a href="javascript:;" class="collapse">
                  </a>
                  <a href="javascript:;" class="reload">
                  </a>
                </div>
              </div>
              <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <? $this->load->view("admin/widget/form_generator");?>
                <!-- END FORM-->
              </div>
              <!-- END VALIDATION STATES-->
            </div>
          </div>
            
            <?php
            $on_multi_uploader = (isset($multi_uploader) ? $multi_uploader : TRUE);

            if($on_multi_uploader) {
            // Images only in edit mode.  
              if($form_data){?>
              <div class="tab-pane" id="tab_5">
                    <div class="portlet box green">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-shopping-cart"></i><?=humanize('Tutorial Image')?>
                          <small>Uploaded</small>

                    </div>
                  </div>
                  <div class="portlet-body form">
                    
                    <!-- BEGIN FORM-->
                    <? $this->load->view("admin/tutorial/image");?>
                    <!-- END FORM-->
                  </div>
                  <!-- END VALIDATION STATES-->
                </div>
              </div>

                <div class="tab-pane" id="tab_4">
                    <div class="portlet box green">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-shopping-cart"></i><?=humanize('Movie Trailer')?>
                          <small>Uploaded</small>

                    </div>
                  </div>
                  <div class="portlet-body form">
                    
                    <!-- BEGIN FORM-->
                    <? $this->load->view("admin/widget/_video_trailer");?>
                    <!-- END FORM-->
                  </div>
                  <!-- END VALIDATION STATES-->
                </div>
              </div>

                <div class="tab-pane" id="tab_3">
                    <div class="portlet box green">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-shopping-cart"></i><?=humanize('tutorial')?>
                          <small>Uploaded</small>

                    </div>
                  </div>
                  <div class="portlet-body form">
                    
                    <!-- BEGIN FORM-->
                    <? $this->load->view("admin/widget/_video");?>
                    <!-- END FORM-->
                  </div>
                  <!-- END VALIDATION STATES-->
                </div>
              </div>

              <?
              }
            }
            ?>
          </div>
      </div>
  </div>
</div>
<script>
  $(document).ready(function() {    
      Metronic.init(); // init metronic core components
      QuickSidebar.init(); // init quick sidebar
      Demo.init(); // init demo features
      UIAlertDialogApi.init(); //UI Alert API
      FormFileUpload.init();

      $("#example").DataTable({
        "order": [[ 0, "DESC" ]],
      });


      
    if(!<?=$id?>) // when add product detail, disabled images and item set tab
    {
    $('.tabbable li a[href=\#tab_1]').css({"background-color": "#CFD1CF",
                        "color": "#fff"
                        });
    $('.tabbable li a[href=\#tab_2]').css({"background-color": "#CFD1CF",
    "color": "#fff"
    });
    $('.tabbable li a[href=\#tab_1]').click(false);
    $('.tabbable li a[href=\#tab_2]').click(false);
    } 
    if('<?=$_GET["msgtype"]?>' == 'success'){ // when add/edit product detail, switched to images tab
    $('.tabbable li a[href=\#tab_1]').click();
    }
    
      <?if($error)
          echo "AdminToastr.error('".str_replace("\n","",validation_errors('<div>', '</div></br>'))."');";
      ?>
  });


$(function() {
  var uploader = new plupload.Uploader({
    browse_button: 'uploadFile', // this can be an id of a DOM element or the DOM element itself
    url: BASE_URL+'admin/tutorial/ajax-uploadtoserver?id=<?=$form_data['tutorial']['tutorial_id']?>',
    chunk_size: '4024gb',
    max_retries: 3,
    multi_selection: false,
    preinit : {
        UploadComplete: function(up, files) {

          AdminToastr.success('tutorial Uploaded');
          setTimeout(function(){ location.reload(); }, 1000);
        }
    }
  });

  uploader.init();

  uploader.bind('FilesAdded', function(up, files) {
  var html = '';
  plupload.each(files, function(file) {
    var ext = file.name.split('.').pop().toLowerCase();
    if($.inArray(ext, ['mp4','ogg','webm']) == -1) {
        
        file = '';
        AdminToastr.error('Extension Not allowed');
        
    }
    else{
        html += '<li id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></li>';
    }
  });
  document.getElementById('filelist').innerHTML += html;
});

  uploader.bind('UploadProgress', function(up, file) {
    document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
  });

  uploader.bind('Error', function(up, err) {
    document.getElementById('console').innerHTML += "\nError #" + err.code + ": " + err.message;
  });

  document.getElementById('upload').onclick = function() {
    if($("#filelist li").length > 0) {
      uploader.start();
    }
    else {
      AdminToastr.error('Please select file first');
    }
  };

});



</script>
