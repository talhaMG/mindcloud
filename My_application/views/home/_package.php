<section class="pkgs">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mainHd">Our Packages</h2>
            <div class="tabStyle1">
              <ul class="nav nav-tabs" role="tablist">

                <li role="presentation" class="active">
                  <a href="#advertisingTab" aria-controls="advertisingTab" role="tab" data-toggle="tab">Business Advertising</a>
                </li>
              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="jobPostTab">
                  <div class="row flexRow">
                  <?php if (isset($package) && array_filled($package)): ?>
                    
                    <?php foreach ($package as $key => $value): ?>
                    
                      <div class="col-md-3 col-sm-4">
                      <div class="pkgsWrap">
                        <div class="topHdr">
                          <h4><?=$value['package_name']?></h4>
                        </div>
                        <div class="btmHdr">
                         <strong><?=price($value['package_price'])?></strong>
                          <span>For<br><?=$this->model_package->get_period_number($value['package_period_no']).' '.$this->model_package->get_expiry_date_by_type($value['package_period'],true)?> </span>
                        </div>
                        <div class="contnt">
                     
                        <?=html_entity_decode($value['package_desc'])?>
                        </div>
                        <div class="fotr">
                          <a href="javascript:void(0)" class="package-book-btn-valid" data-pkg-id= "<?=$value['package_id']?>">Get Started</a>
                        </div>
                      </div>
                    </div>

                    <?php endforeach ?>

                  <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script type="text/javascript">
      $(".contnt ul").addClass("contntList");
      $(".contnt ul li").wrap("<p></p>");

    </script>