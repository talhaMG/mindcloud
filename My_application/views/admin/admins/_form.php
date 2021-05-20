<style type="text/css">
  .right {color: green;font-size: 12px;font-weight: bold;}
</style>
<?global $config;
$model_heads = explode("," , $dt_params['dt_headings'] );
?>
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN VALIDATION STATES-->
      <div class="tabbable tabbable-custom boxless tabbable-reversed">
        <ul class="nav nav-tabs">
              <li class="active">
                <a href="#tab_0" data-toggle="tab">
                <?=ucfirst($page_title)?> </a>
              </li>

              
              <li>
                <a href="#tab_1" data-toggle="tab">
                <?=ucfirst($page_title)?> Other Info. </a>
              </li>

              <? if (isset($this->form_data['user']['user_type']) AND ($this->form_data['user']['user_type'] == PROFESSIONALS_USER)) {?>
              <li><a href="#tab_2" data-toggle="tab"> Professional Speaker Info </a></li>
              <?php } ?>
           
              
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
                    <!-- <a href="javascript:;" class="collapse">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a> -->
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
              <div class="tab-pane" id="tab_1">
                    <div class="portlet box green">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-shopping-cart"></i><?=humanize($page_title)?>
                          <small>Other Info </small>

                    </div>
                    <div class="tools">
                      <a href="javascript:;" class="collapse">
                      </a>
                      <a href="javascript:;" class="reload">
                      </a>
                    </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- <p style="color: green;font-weight: bold;margin: 0;padding: 5px 11px;">
                      Best image size is : 500px x 500px
                    </p> -->
                    <!-- BEGIN FORM-->
                    <? $this->load->view("admin/admins/_other_info");?>
                    <!-- END FORM-->
                  </div>
                  <!-- END VALIDATION STATES-->
                </div>
              </div>


              <? if (isset($this->form_data['user']['user_type']) AND ($this->form_data['user']['user_type'] == PROFESSIONALS_USER)) {?>
              <div class="tab-pane" id="tab_2">
                <div class="portlet box green">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="fa fa-shopping-cart"></i>Professional Speaker<small> Info </small>
                    </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <? $this->load->view("admin/user/_speaker_info");?>
                    <!-- END FORM-->
                  </div>
                </div>
              </div>
              <?php } ?>
              
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
      //FormFileUpload.init();

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


    $("#user-user_rights").change(function(){
      var id = $(this).val();
      $(".right").hide();
      $("#right-"+id).show();
    });
	  
      <?if($error)
          echo "AdminToastr.error('".str_replace("\n","",validation_errors('<div>', '</div></br>'))."');";
      ?>
  });
</script>
