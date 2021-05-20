<section class="browseCategory">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mainHd"><?=$cate['cms_page_title']?></h2>
            <?=html_entity_decode($cate['cms_page_content'])?>
          </div>
          <div class="col-md-12">
            <ul class="categories">
            <?php if (isset($category) && array_filled($category)): ?>
              <?php foreach ($category as $key => $value): ?>
              

              <li>
                <a href="<?=l('category').'/'.$value['category_slug']?>">
                  <img src="<?=get_image($value['category_image'],$value['category_image_path'])?>" alt="">
                  <span><?=ucfirst($value['category_name'])?></span>
                  <small><?=$value['job_number']?> jobs</small>
                </a>
              </li>

              <?php endforeach ?>
            <?php endif ?>

            </ul>
          </div>
          <div class="col-md-12 text-center">
            <a href="<?=l('jobs/category')?>" class="btn btn-danger btnStyle1">Browse All Categories</a>
          </div>
        </div>
      </div>
      <img src="<?=get_image($cate['cms_page_image'],$cate['cms_page_image_path'])?>" alt="" width="100%">
    </section>