<section class="howItWorks" id="next">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mainHd"><?=$how['cms_page_title']?></h2>
            <?=html_entity_decode($how['cms_page_content'])?>
          </div>
          <div class="col-md-12">
            <ul class="steps">
              <li>
                <div class="step step1">
                  <div class="circle">
                    <i class="fa fa-user"></i>
                    <span class="badge">1</span>
                  </div>
                  <h5><?=$how1['cms_page_title']?></h5>
                <?=html_entity_decode($how1['cms_page_content'])?>
                </div>
              </li>
              <li>
                <div class="step step2">
                  <div class="circle">
                    <i class="fa fa-money"></i>
                    <span class="badge">2</span>
                  </div>
                  <h5><?=$how2['cms_page_title']?></h5>
                <?=html_entity_decode($how2['cms_page_content'])?>
                </div>
              </li>
              <li>
                <div class="step step3">
                  <div class="circle">
                    <i class="fa fa-thumbs-o-up"></i>
                    <span class="badge">3</span>
                  </div>
                   <h5><?=$how3['cms_page_title']?></h5>
                <?=html_entity_decode($how3['cms_page_content'])?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>