<style type="text/css">
  .row{
    margin: 0
  }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">  
  <?php 
                /*if ($comments_count == 0){ ?>
                <h3>BE THE FIRST TO REVIEW “<?=strtoupper($proname)?>”</h3>
                <?php } else{?>
                <h3>LEAVE YOUR COMMENTS</h3>
                <?}*/?>
                <p style="margin: 0">We value your reviews</p>

                <?php if ($this->userid < 1): ?>
                  <div class="alert alert-warning">
                    <strong>Note!</strong> Sign in to post a comment.
                  </div>
                <?php endif ?>
                <div class="comments-area">
                  <form id="forms-comments" class="comment-form">
                    <input type="hidden" name="comment[comment_user_id]" value="<?=$this->userid?>">
                    <input type="hidden" name="comment[comment_product_id]" value="<?=$comment_info['pro_id']?>">
                    <p> <span class="rating">
                      <input type="radio" id="star5" name="comment[comment_rating]" value="5">
                      <label class="full" for="star5" title="Awesome - 5 stars"></label>
                      <input type="radio" id="star4half" name="comment[comment_rating]" value="4.5">
                      <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                      <input type="radio" id="star4" name="comment[comment_rating]" value="4">
                      <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                      <input type="radio" id="star3half" name="comment[comment_rating]" value="3.5">
                      <label class="half" for="star3half" title="Average - 3.5 stars"></label>
                      <input type="radio" id="star3" name="comment[comment_rating]" value="3">
                      <label class="full" for="star3" title="Average - 3 stars"></label>
                      <input type="radio" id="star2half" name="comment[comment_rating]" value="2.5">
                      <label class="half" for="star2half" title="bad - 2.5 stars"></label>
                      <input type="radio" id="star2" name="comment[comment_rating]" value="2">
                      <label class="full" for="star2" title="bad - 2 stars"></label>
                      <input type="radio" id="star1half" name="comment[comment_rating]" value="1.5">
                      <label class="half" for="star1half" title="bad - 1.5 stars"></label>
                      <input type="radio" id="star1" name="comment[comment_rating]" value="1">
                      <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                      <input type="radio" id="starhalf" name="comment[comment_rating]" value="0.5">
                      <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </span> </p>

                    <p class="comment-form-author">
                      <input type="hidden" value=" <?=$user_data['user_firstname']?> <?=$user_data['user_lastname']?>" required name="comment[comment_name]" class="form-control" readonly placeholder="Your Name*">
                    </p>
                    <p class="comment-form-comment">
                      <input type="hidden" name="comment[comment_rply_to]" id="txt_rply" value="0">
                      <textarea required name="comment[comment_comment]" id="someTextBox" placeholder="Your comments *" rows="6"></textarea>
                    </p>
                  <div class="clearfix"></div>
                  <p class="form-submit text-center">
              <input type="submit" value="Post Comment" id="forms-comments-btn" class="btnStyle">
                  </p>
                </form>
              </div>
            </div>