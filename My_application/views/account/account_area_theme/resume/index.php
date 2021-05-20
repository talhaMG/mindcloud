
<script src="<?=g('base_url')?>/assets/admin/scripts/jquery.min.js"></script>




<div class="col-md-10 col-xs-12 col-sm-8 center">
  <div class="">

    <!-- <h2 class="dhead">  <?=$title?> </h2> -->

    <div class="aboutForm">
     <div class="row">
      <div class="col-md-12">
        <div class="tabbable tabbable-custom boxless tabbable-reversed">
          <ul class="nav nav-tabs">

            <?php
               // if (!isset($_GET['id'])):
            ?>

            <li class="active" id="detail">
              <a href="#tab_0" data-toggle="tab">
              MANAGE RESUME </a>
              </li>

              <?php
               // endif 
              ?>              

            </ul>
              <div class="tab-content">
                <div class="tab-pane <?=!isset($_GET['id']) ? 'active' : ''?>" id="tab_0">
                  <div class="portlet box green">
                    <div class="portlet-title">
                      <div class="caption">
                      </div>
                      <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
                        <a href="javascript:;" class="reload">
                        </a>
                      </div>
                    </div>
                    <div class="portlet-body form">
                      <?
                      
                      $this->load->view("account/account_area_theme/default/_form_generator");


                      ?>

                    </div>

                  </div>
                </div>
                 

                  

            </div>
          </div>
        </div>

      </div>


    </div>

  </div>


  <script src="<?=g('base_url')?>/assets/admin/scripts/jquery.min.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/jquery-migrate.min.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/metronic.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/layout.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/quick-sidebar.js"></script>

  <script src="<?=g('base_url')?>/assets/admin/scripts/demo.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/jquery.blockui.min.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/tkd_script.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/ui-alert-dialog-api.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/jquery.validate.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/form-validation-script.js"></script>
  <script src="<?=g('base_url')?>/assets/admin/scripts/jquery.validate.min.js"></script>       
  <script src="<?=g('base_url')?>/assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="<?=g('base_url')?>/assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>





  <script>
    $(document).ready(function() {    
      Metronic.init(); // init metronic core components
      QuickSidebar.init(); // init quick sidebar
      Demo.init(); // init demo features
      UIAlertDialogApi.init(); //UI Alert API
      FormFileUpload.init();  //loads file on page upload

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

//form css
// $(".control-label").removeClass("col-md-2");
// $(".control-label").addClass("col-md-3");

// $(".form-group div").removeClass("col-md-3");
// $(".form-group div").addClass("col-md-4");

});


// $(".make-switch").parent().parent().css("display","none");
// $(".control-label").removeClass("col-md-2");
// $(".control-label").addClass("col-md-3");

// $(".form-group div").removeClass("col-md-2");
// $(".form-group div").addClass("col-md-8");

</script>
