<section class="whoSec bg-white hding-2 para">
    <div class="container">
        <div class="whoHead">
            <h2><?=$cont9['cms_page_title']?></h2>
            <div class="space"><br></div>
            <?=html_entity_decode($cont9['cms_page_content'])?>
        </div>
        <div class="space"><br><br><br></div>

        <ul class="who-list">
            <li>
                <div class="vid-box">
                    <a href="<?=get_image($cont10['tutorial_video'],$cont10['tutorial_video_path'])?>" data-fancybox="media">
                    <div class="video-box">
                        <img src="<?=get_image($cont10['cms_page_image'],$cont10['cms_page_image_path'])?>">
                        <span><i class="fas fa-play"></i></span>
                    </div>
                    </a>

                    <div class="vid-content">
                    <h4><?=$cont10['cms_page_title']?></h4>
                    <?=html_entity_decode($cont10['cms_page_content'])?>
                    </div>
                </div>
            </li>

            <li>
                <div class="vid-box">
                    <a href="<?=get_image($cont11['tutorial_video'],$cont11['tutorial_video_path'])?>" data-fancybox="media">
                    <div class="video-box">
                        <img src="<?=get_image($cont11['cms_page_image'],$cont11['cms_page_image_path'])?>">
                        <span><i class="fas fa-play"></i></span>
                    </div>
                    </a>

                    <div class="vid-content">
                    <h4><?=$cont11['cms_page_title']?></h4>
                    <?=html_entity_decode($cont11['cms_page_content'])?>
                    </div>
                </div>
            </li>

            <li>
                <div class="vid-box">
                    <a href="<?=get_image($cont12['tutorial_video'],$cont12['tutorial_video_path'])?>" data-fancybox="media">
                    <div class="video-box">
                        <img src="<?=get_image($cont12['cms_page_image'],$cont12['cms_page_image_path'])?>">
                        <span><i class="fas fa-play"></i></span>
                    </div>
                    </a>

                    <div class="vid-content">
                    <h4><?=$cont12['cms_page_title']?></h4>
                    <?=html_entity_decode($cont12['cms_page_content'])?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>  