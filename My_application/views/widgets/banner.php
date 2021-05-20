
<div class="custom-slider">
<div id="carousel-example-generic" class="carousel slide topslider" data-ride="carousel">
<ol class="carousel-indicators">
  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  <li data-target="#carousel-example-generic" data-slide-to="3"></li>
</ol>
<div class="carousel-inner" role="listbox">
  <?php if (isset($banner) && array_filled($banner)): ?>
    <?php foreach ($banner as $key => $value): ?>
  
  <div class="item <?=($key == 0) ? 'active' : ''?>">
    <img src="<?=get_image($value['banner_image'],$value['banner_image_path'])?>" alt="">
    <div class="sliderItem">
      <div class="container">
        <div class="row flexRow">
          <div class="col-md-8 col-sm-8 col-xs-12 flexCol centerCol">
            <div>
              <div class="slider-content">
                <h2><?=$value['banner_layout1']?></h2>
                <h1 class="text-uppercase wow slideInDown" data-wow-duration="1s"><?=$value['banner_layout2']?></h1>
                <?=html_entity_decode($value['banner_layout3'])?>
                <div class="btn-sec">
                  <a href="<?=l('shop')?>">View Products</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php endforeach ?>
  <?php endif ?>
  
    
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>