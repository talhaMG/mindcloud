
<div class="row pt-60">
  <div class="col-md-12 white_bg">
    <div class="comments-area comments ">
      <h2 class="comments-title"><?=$comment_info['comments_count']?> comments</h2>
      <ol class="comment-list">
        <?php if (isset($comments) && array_filled($comments)): ?>
          <?php foreach ($comments as $key => $value): 
          ?>
          <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent">
            <div class="comment-body">
              <div class="comment-meta">
                <div class="comment-author vcard">
                  <img alt="img" src="<?=$value['comment_profile']?>" class="avatar avatar-72 photo" style="height: 100px">  
                  <b class="fn"><?=ucfirst($value['comment_name'])?></b>
                </div>
                <div class="comment-metadata"><a href="#"><?=csl_date($value['comment_createdon'] ,  'F d,Y')?></a></div>
              </div>
              <div class="comment-content">
                <p class="glyp_icon"> 
                  <?php if ($value['comment_rating'] > 0){
                    $count = ceil($value['comment_rating']);
                    for($i=1; $i<=$count; $i++){?>

                    <i aria-hidden="true" class="fa fa-star"></i>
                    <?}
                    if (strpos($number,'.') !== false) 
                      {?>
                       <i aria-hidden="true" class="fa fa-star-half-o"></i> 
                       <?}?>

                     <?}?>
                   </p>
                   <p class="text_wid"><?=$value['comment_comment']?></p>
                   <?php if (isset($value['replies']) && array_filled($value['replies'])): ?>
                    <?php foreach ($value['replies'] as $key => $val):
                    ?>
                    <div class="reply_comment">
                      <div class="comment-meta">
                        <div class="comment-author vcard">
                          <img alt="img" src="<?=$val['comment_profile']?>" class="avatar avatar-72 photo" style="max-height: 100px;">  
                          <b class="fna"><?=ucfirst($val['comment_name'])?> </b>
                        </div>
                        <div class="comment-metadata1"><a href="#"><?=csl_date($val['comment_createdon'] ,  'F d,Y')?></a></div>
                        <p class="text_wid1"><?=$val['comment_comment']?></p>
                      </div>
                    </div>
                  <?php endforeach ?>
                <?php endif ?>

                <div class="clearfix"></div>

                <div class="">
                  <ul class="comment-actions">
                    <li>
                      <form class="forms-reply-comment">
                        <div class="rply">
                          <div class="collapse in" aria-expanded="true" style="">
                            <div class="well">
                              <input type="hidden" name="comment[comment_user_id]" value="<?=$this->userid?>">
                              <input type="hidden" name="comment[comment_rply_to]" value="<?=$value['comment_id']?>">
                              <input type="hidden" name="comment[comment_name]" value="<?=$user_data['user_firstname']?> <?=$user_data['user_lastname']?>">
                              <input type="hidden" name="comment[comment_product_id]" value="<?=$comment_info['pro_id']?>">
                              <input class="form-control form-control-lg" type="text" placeholder="Add a comment" name="comment[comment_comment]" id="comment_reply_feild" required="">
                            </div>
                          </div>
                        </div>
                        <!-- <button class="btn btn-primary collapse-trigger" type="button" data-toggle="collapse" data-target="#1" aria-expanded="true" aria-controls="collapseExample"> <span class="collapsed-hidden expanded-visible-inline">Reply</span> </button> -->
                        <!-- <button class="btn btn-primary btn-reply" type="button" data-comment-id = "<?=$value['comment_id']?>"> <span class="collapsed-hidden expanded-visible-inline">Reply</span> </button> -->
                        <button class="btn btn-primary forms-repcomments-btn" type="submit" data-comment-id = "<?=$value['comment_id']?>"> <span class="collapsed-hidden expanded-visible-inline">Reply</span> </button>

                      </form>
                    </li>
                  </ul>
                </div>
              </div>

            </li>
          <?php endforeach ?>
        <?php endif ?>

      </ol>

      <?$this->load->view("widgets/_widget-comment_section",$comment_info)?> 

      <!-- Comment Form /- -->
    </div>
  </div>
</div>