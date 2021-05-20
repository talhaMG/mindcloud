<div class="course-box hding-3">
    <div class="course-box-content">
        <div class="course-box-head">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3><?= $course_name ?></h3>
                </div>
                <div class="col-md-4 text-right">
                    <div id="activeBorder" class="active-border">
                        <div id="circle" class="circle">
                            <span class="prec">66</span>
                            <span id="startDeg" class="90"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space"><br><br><br></div>

            <div class="course-user-info">
                <ul class="login-btn">
                    <li><a href="#"><span><img src="<?= i('') ?><?= $this->session_data['profile_image'] ?>"></span> <?= $this->session_data['username'] ?> </a></li>
                </ul>
            </div>
        </div>
       
        <div class="course-list">
            <ul class="course-scroll tut-menu-inner">
                <h5><?= $course_name ?></h5>
                
                <li><a href="<?= l('account/profile/expert-detail-tutorial') ?>?courseid=<?= $courseid ?>" class="active">Tutorial Description
                        <div id="activeBorder" class="active-border">
                            <div id="circle" class="circle">
                                <span class="prec">66</span>
                                <span id="startDeg" class="90"></span>
                            </div>
                        </div>
                    </a></li>

                <li><a href="<?= l('account/profile/expert-detail-tutorial-intro-video') ?>?courseid=<?= $courseid ?>">Tutorial - 1 minute introduction
                        <div id="activeBorder" class="active-border">
                            <div id="circle" class="circle">
                                <span class="prec">66</span>
                                <span id="startDeg" class="90"></span>
                            </div>
                        </div>
                    </a></li>

                <!-- <li><a href="">Tutorial Video and Transcript
                        <div id="activeBorder" class="active-border">
                            <div id="circle" class="circle">
                                <span class="prec">66</span>
                                <span id="startDeg" class="90"></span>
                            </div>
                        </div>

                    </a> -->
                    <li class="subVideos">
                        <? if(isset($tutorial_course) AND array_filled($tutorial_course)) :?>
                        <? foreach($tutorial_course as $key=>$tutor):
                            // $value['cp_tutorial_id']
                            //  debug($tutor);
                             
                            ?>
                            <ul>
                                <li><a href="<?= l('account/profile/expert-detail-tutorial-video')?>?courseid=<?= $courseid ?>&tutorialid=<?= $tutor['videos_id'] ?>">Video and Transcript<?//= $tutor['tutorial_name'] ?></a></li>
                            </ul>
                        <? endforeach;?>
                        <? endif;?>
                        </li>
                    
                <!-- </li> -->

            </ul>
        </div>
    </div>
</div>