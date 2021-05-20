
<div class="business-page">
    <section class="dashboard">

        <ul class="dashboard-layout">
            <li>
            <div class="front-dashboard">
            <a href="#" class="menu-dash-front">MENU<i class="fal fa-bars"></i></a>
            <? $this->load->view("widgets/dashboard-menu-box");?>
        </div>
         </li>

            <li>
                <? $this->load->view("widgets/expert-course-box");?>
            </li>

            <li>

                <div class="tutorial-box">
                    <div class="tutorial-scroll-content">
                        <div class="tutorial-content">
                            <div class="tutorial-head">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <ul class="bredcum-links">
                                            <li><a href="#">Learning Journey</a></li>
                                            <li><a href="#">Introduction</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-5 text-right">
                                        <div class="bredcum-right">
                                            <a href="#" class="btn-round btn-hover">In progress <span></span></a>

                                            <ul class="indicator-links">
                                                <li><a href="#"><i class="fal fa-angle-left"></i></a></li>
                                                <li><a href="#"><i class="fal fa-angle-right"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tutorial-mid hding-4 hding-3 para">
                                <div class="tutorial-mid-content">
                                    <h4>Tutorial Contents:</h4>
                                </div>
                                <div class="space"><br><br></div>
                                <p><strong>In this tutorial, you will learn:</strong></p>
                                <div class="space"><br></div>

                                <? if(isset($expert_course) AND array_filled($expert_course)) :?>
                                <? foreach($expert_course as $key=>$value):?>
                                <h5><?= html_entity_decode($value['tutorial_desc']) ?></h5>
                                <? endforeach;?>
                                <? endif;?>

                                <div class="space"><br><br></div>

                                <? if(isset($expert_course) AND array_filled($expert_course)) :?>
                                <? foreach($expert_course as $key=>$value):?>
                                <h5><?= html_entity_decode($value['tutorial_desc2']) ?></h5>
                                <? endforeach;?>
                                <? endif;?>
                                <!-- <ul class="mid-list">
                                    <li>What is CX and what is the measure of Cx Success? PURR</li>
                                    <li>How to weave CX & PURR into your business through the Four Pillars; Brand, Segmentation, Insights and Journeys</li>
                                    <li>What is Voice of Customer (VOC) and VOC Tools?</li>
                                </ul> -->
                                <div class="space"><br><br></div>

                                <a href="#" class="btn-dashboard btn-hover">Mark Complete <span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
</div>
