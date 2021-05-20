<?$this->load->view("widgets/inner_banner")?>
<section class="sign-in-main">
      <div class="body-space">
        <div class="container">
          <div class="row">
            <div class="main-head">
              <h2>Login</h2>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="sign-in-form">
            <div class="col-md-8 col-sm-11 col-xs-12 centerCol">
			
			<form id="forms-signin">
			  <? if(isset($_GET['url'])):?>
			  <input type="hidden" name="url" value='<?=$_GET['url']?>'>
			  <? endif;?>
		  
              <div class="col-md-6 col-sm-6 col-xs-12 padd-0">

                <img src="<?=get_image($cms_data['cms_page_image'],$cms_data['cms_page_image_path'])?>" alt="">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 padd-0">
                <div class="sign-in-info">
                  <div class="row">
                  
                  <h5><?=$cms_data['cms_page_title']?></h5>
                    
                    <?=html_entity_decode($cms_data['cms_page_content'])?>
                  </div>
                  <div class="row">
                    <input type="text" name="user[user_email]" id="defaultForm-email" placeholder="Login">
                  </div>
                  <div class="row">
                    <input type="password" name="user[user_password]" id="defaultForm-pass" placeholder="Password">
                  </div>
                  <div class="row">
                    <div class="check-div">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="">
                          <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                          Keep me logged in   
                        </label>
                        <a href="<?=l('forgot-password')?>" id='signin-btn' class="pull-right">Forgot your password ?</a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <button>login</button>
                  </div>
                </div>
              </div>
			  </form>
			  
            </div>
          </div>
        </div>
      </div>
    </section>