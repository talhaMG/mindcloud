<section class="testiSec hding-2 para bg-white pad-sec">
    <div class="container">
        <ul class="testi-slider">
        
            <?php foreach ($testimonial as $key => $value): ?>
                <li>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="t-profile">
                                <div class="t-image">
                                    <img src="<?=get_image($value['testimonials_image'],$value['testimonials_image_path'])?>">
                                </div>
                                <div class="space"><br><br><br></div>

                                <h5><?=$value['testimonials_title']?></h5>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="t-content">
                                <h2><?=$value['testimonials_heading']?></h2> 
                                <div class="space"><br><br></div>

                                <?=html_entity_decode($value['testimonials_desc'])?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach ?> 
        </ul>
    </div>
</section>