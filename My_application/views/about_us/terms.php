<?$this->load->view("widgets/inner_banner")?>
<section class="content-se">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <h2><?=$content['cms_page_title']?></h2>
            <?=html_entity_decode($content['cms_page_content'])?>
         </div>
      </div>
   </div>
</section>