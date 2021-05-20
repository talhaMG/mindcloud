
        <!-- Begin: Crousel -->
    <div class="ban">
      <h2>Search</h2>
      <h3><?=$searchfor?></h3>
    </div>

    <section class="searchFilter" style="height: 135px; !important">
      <div class="container">
        <?$this->load->view("widgets/_search")?>
      </div>
    </section>
    <!-- END: Crousel -->
<section class="courseCatelog">
      <div class="container">
        <div class="row">
          <?php if (isset($course) && array_filled($course)): ?>
            <?php foreach ($course as $key => $value): ?>
          <div class="col-md-4 col-xs-12 col-sm-4">
            <div class="media">
              <div class="img">
                <img src="<?=get_image($value['tutorial_image'],$value['tutorial_image_path'])?>" alt="">
                <span class="tag"><?=price($value['tutorial_price'])?></span>
                <span class="courseNo">Course # <?=$value['tutorial_identity']?></span>
              </div>
              <div class="content">
                <a href="#" data-toggle="modal" data-target="#packageModal" data-link="<?=l('course-detail').'/'.$value['tutorial_slug']?>" class="c_detail" data-package-link = "<?=l('course-packages').'/'.$value['tutorial_slug']?>" ><?=$value['tutorial_name']?></a>
              </div>
            </div>
          </div>

            <?php endforeach ?>
          <?php endif ?>
        </div>
        </div>
      </div>
    </section>


    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <a href="#" class="btnStyle" id="tutorial_package">Package Page</a> <br>
            <a href="#" class="btnStyle" id="detail_page">Individual Course Page</a>
          </div>
        </div>
      </div>
    </div>