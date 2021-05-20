<style>
    .course-scroll h5:first-child {
        display: none;
    }
    li.dropdown-toggle.b-child.catLj19 ul {
    display: none !important;
}
.course-list ul li.dropdown-toggle.catLj19>a:after {
    content: "";
}
</style>
<div class="course-box hding-3">
    <div class="course-box-content">
        <div class="course-box-head">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3>Learning Journey</h3>
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
                <? // print_r($this->session->userdata); 
                ?>
                <ul class="login-btn">
                    <li><a href="#"><span><img src="<?= i('') ?><?= $this->session_data['profile_image'] ?>"></span> <?= $this->session_data['username'] ?> </a></li>
                </ul>
            </div>
        </div>
        <ul>
            <li style="text-align: left;"><a href="<?= l('account/profile/learning') ?>" class="active" style="font-size: 15px;color: #122B46;font-weight: 700;padding: 18px 15px;">Intro to Learning Journey </a></li>
        </ul>
        <?
        $dt = array('tools', 'tools_vp', 'tools_swot', 'tools_pmmt', 'tools_smp', 'tools_cjdg', 'tools_mc', 'tools_osf', 'tools_lts','' , 'tools_fm_income', 'tools_fm_bss', 'tools_fm_cfs', 'tools_fm_beps', 'tools_fm_dcvm', 'tools_ids');
        ?>
        <div class="course-list">
            <ul class="course-scroll">
                <!-- <li><a href="javascript:void(0)" class="active">Introduction <span><i class="far fa-check"></i></span> </a></li> -->
                <? if (isset($learn_cat) and array_filled($learn_cat)) : ?>
                    <?php $dt_index = 0; ?>
                    <? foreach ($learn_cat as $keynew => $value) : ?>
                        <h5><?= $value['learning_journey_category_name'] ?></h5>
                        <?
                        $al = array();
                        $al['where']['learning_journey_cat_id'] = $value['learning_journey_category_id'];

                        $ck = $this->model_learning_journey_content->find_all_active($al);
                        //  debug($ck);
                        ?>
                        <? if (isset($ck) and array_filled($ck)) : ?>
                            <? foreach ($ck as $keytwo => $value) :
                                // debug($value); 
                                $a = $value['learning_journey_content_id'];
                            ?>
                                <li class="dropdown-toggle b-child catLj<?=$a?>"><a href="#"><?= $value['learning_journey_content_name'] ?>

                                        <div id="activeBorder" class="active-border">
                                            <div id="circle" class="circle">
                                                <span class="prec">66</span>
                                                <span id="startDeg" class="90"></span>
                                            </div>
                                        </div>

                                        <small>0/3</small>
                                    </a>

                                    <ul class="dropdown-box" style="display: none;">
                                        <!-- <li><a href="business-model-canvas.php"><i class="fad fa-video"></i>Intro<span><i class="far fa-check"></i></span></a></li> -->
                                        <li id="activeId-<?= $a ?>"><a href="<?= l('account/profile/video') ?>?cat=<?= $a ?>"><i class="fad fa-video"></i> Video & Transcript <span><i class="far fa-check"></i></span></a></li>
                                        <li><a href="<?= l('account/profile/') ?><?= $dt[$dt_index] ?>"><i class="fad fa-video"></i> Tool & Tool Builder <span><i class="far fa-check"></i></span></a></li>
                                        <?php $dt_index = $dt_index + 1; ?>


                                        <li><a href="<?= l('account/profile/startup') ?>"><i class="fad fa-video"></i> Your Work<span><i class="far fa-check"></i></span></a></li>
                                    </ul>
                                </li>
                            <? endforeach; ?>
                        <? endif; ?>
                    <? endforeach; ?>
                <? endif; ?>
            </ul>
        </div>
    </div>
</div>