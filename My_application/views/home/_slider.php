<div class="main-slider">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
        <?php if (isset($banner) && array_filled($banner)): ?>
          <?php foreach ($banner as $key => $value): ?>
            <div class="item <?=($key == 0) ? 'active':''?>">
            <img src="<?=get_image($value['banner_image'],$value['banner_image_path'])?>" alt="">
            <div class="carousel-caption">
              <h2><span><?=$value['banner_layout1']?></span><?=$value['banner_layout2']?> </h2>
              <?=html_entity_decode($value['banner_layout3'])?>
            </div>
          </div>
          <?php endforeach ?>
        <?php endif ?>
          <!-- <div class="item active">
            <img src="<?=i('')?>slide.jpg" alt="">
            <div class="carousel-caption">
              <h2><span>Welcome to</span>ADVANCE HEALTH CARE </h2>
              <p>100% Hassle Free Healthcare Continuing Education</p>
            </div>
          </div> -->
          <!-- <div class="item">
            <img src="<?=i('')?>slide.jpg" alt="">
            <div class="carousel-caption">
              <h2><span>Welcome to</span>ADVANCE HEALTH CARE </h2>
              <p>100% Hassle Free Healthcare Continuing Education</p>
            </div>
          </div> -->
        </div>
      </div>
    </div>