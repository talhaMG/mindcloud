<?
$reviews = $this->model_reviews->find_all_active();
$cont = $this->model_cms_page->find_by_pk_active(9);

?>
<section class="sucessStories">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h2><?=$cont['cms_page_title']?></h2>
            <img src="<?=get_image($cont['cms_page_image'],$cont['cms_page_image_path'])?>" alt="" class="intro-girl">
          </div>
          <div class="col-md-6 col-sm-8 ">
            <div class="testimonial">
          <?php if (isset($reviews) && array_filled($reviews)): ?>
            <?php foreach ($reviews as $key => $value): ?>
              <div class="item">
                <?=html_entity_decode($value['reviews_desc'])?>                
                <div class="img">
                  <img src="<?=get_image($value['reviews_image'],$value['reviews_image_path'])?>" alt="" style="max-height: 77px">
                </div>
                <div class="intro">
                  <h4><?=ucfirst($value['reviews_title'])?></h4>
                  <p><?=$value['reviews_other']?></p>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
              
              
            </div>
          </div>
        </div>
      </div>
    </section>