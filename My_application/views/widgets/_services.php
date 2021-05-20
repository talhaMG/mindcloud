<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="delivery-info">
            <img src="<?=get_image($serv['cms_page_image'],$serv['cms_page_image_path'])?>" alt="">
            <h5><?=$serv['cms_page_title']?></h5>
            <?=html_entity_decode($serv['cms_page_content'])?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="delivery-info">
            <img src="<?=get_image($serv1['cms_page_image'],$serv1['cms_page_image_path'])?>" alt="">
              <h5><?=$serv1['cms_page_title']?></h5>
            <?=html_entity_decode($serv1['cms_page_content'])?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="delivery-info">
            <img src="<?=get_image($serv2['cms_page_image'],$serv2['cms_page_image_path'])?>" alt="">
             <h5><?=$serv2['cms_page_title']?></h5>
            <?=html_entity_decode($serv2['cms_page_content'])?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="delivery-info no-bor">
            <img src="<?=get_image($serv3['cms_page_image'],$serv3['cms_page_image_path'])?>" alt="">
            <h5><?=$serv3['cms_page_title']?></h5>
            <?=html_entity_decode($serv3['cms_page_content'])?>
        </div>
    </div>
   </div>