    <style>
    .social a{
        display: contents !important;
    }
    </style>
    <!-- Begin: Crousel -->
    <div class="ban">
      <h2>Contact Us</h2>
    </div>
    <!-- END: Crousel -->

    <section class="contactForm">
      <div class="container">
        <form action="post" class="row formStyle" id="forms-contact_us">
          <div class="col-md-3 col-sm-3">
            <input type="text" class="form-control" placeholder="Full Name" name="inquiry[inquiry_name]" pattern="[a-zA-z ]{2,30}" title="Only Alphabets (minimum 2 charachters)" required="">
          </div>
          <div class="col-md-3 col-sm-3">
            <input type="email" class="form-control" placeholder="Email" required name="inquiry[inquiry_email]">
          </div>
          <div class="col-md-3 col-sm-3">
            <input type="text" class="form-control" placeholder="Subject" name="inquiry[inquiry_subject]">
          </div>
          <div class="col-md-3 col-sm-3"><?$this->load->view("widgets/google_captcha")?>
          </div>
          <div class="col-md-9 col-sm-9">
            <textarea rows="6" class="form-control" placeholder="Message" name="inquiry[inquiry_message]" required></textarea>
          </div>
          <div class="col-md-3 col-sm-3">
          <br>
          <br>
            <button class="btnStyle" type="submit" style="    margin-left: 22px;">Send</button>
          </div>
        </form>
      </div>
    </section>


    <div class="contactInfoDetl">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-sm-4">
            <div class="cell">
              <i class="fa fa-mobile"></i>
              <a href="tel:<?=g('db.admin.phone')?>"><?=g('db.admin.phone')?> - Business Phone</a>
              <a href="tel:<?=g('db.admin.bussiness_phone')?>"><?=g('db.admin.bussiness_phone')?> - Office Phone</a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="cell mail">
              <i class="fa fa-envelope"></i>
              <a href="mailto:<?=g('db.admin.support_email')?>"><?=g('db.admin.support_email')?></a>
              <a href="mailto:<?=g('db.admin.email_contact_us')?>"><?=g('db.admin.email_contact_us')?></a>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="cell social">
             
              <?php if (!empty(g('db.admin.instagram_id'))): ?>
                    <a href="<?=g('db.admin.instagram_id')?>" target="_blank" >
                    <i class="fa fa-instagram"></i>
                    </a>
                <?php endif ?>
                
              <?php if (!empty(g('db.admin.facebook_id'))): ?>
              <a href="<?=g('db.admin.facebook_id')?>" target="_blank" >
              <i class="fa fa-facebook-square"></i>
              </a>
              <?php endif ?>
              <?php if (!empty(g('db.admin.linkedin_id'))): ?>
              <a href="<?=g('db.admin.linkedin_id')?>" target="_blank" >
              <i class="fa fa-linkedin"></i>
              </a>
              <?php endif ?>
              <br>
              <a href="<?=l('')?>">Advancehealthcarece.edu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
