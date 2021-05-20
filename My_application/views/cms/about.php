
<section class="innerBanner">
  <div class="container">
    <div class="container">
      <h2> About</h2>
    </div>
  </div>
</section>
<section class="aboutMain">
  <section class="aboutbox">
    <div class="container">
      <div class="col-md-6 col-xs-12 col-sm-6">
        <img src="<?=get_image($sec1['cms_page_image'],$sec1['cms_page_image_path'])?>" class="img-responsive">
      </div>
      <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="aboutBoxText">
          <div>
            <h2><?=$sec1['cms_page_title']?></h2>
            <?=html_entity_decode($sec1['cms_page_content'])?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="aboutboxCenter aboutbox">
    <div class="container">
      <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="aboutBoxText">
          <div>
            <h2><?=$sec2['cms_page_title']?></h2>
            <?=html_entity_decode($sec2['cms_page_content'])?>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-xs-12 col-sm-6"><img src="<?=get_image($sec2['cms_page_image'],$sec2['cms_page_image_path'])?>" class="img-responsive"></div>
    </div>
  </section>
  <section class="aboutbox">
    <div class="container">
      <div class="col-md-6 col-xs-12 col-sm-6"><img src="<?=get_image($sec3['cms_page_image'],$sec3['cms_page_image_path'])?>" class="img-responsive"></div>
      <div class="col-md-6 col-xs-12 col-sm-6">
        <div class="aboutBoxText">
          <div>
            <h2><?=$sec3['cms_page_title']?></h2>
            <?=html_entity_decode($sec3['cms_page_content'])?>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>