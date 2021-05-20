<?//=view_normal('widgets/_inner_page_slider')?>
<style type="text/css">

</style>

<section class="breadcrumb_sec signin_bg">
    <div class="container">
        <h1 data-aos="fade-in" data-aos-duration="3000">Dashboard</h1>
    </div>
</section>

<section id="our-works">
<section class="advisorAccountarea">

    <div id="services_section">
      <div class="row">
        <div class="col-sm-12">
          <div class="accountareaStyle">
            <div class="services_tabs">
              <div class="row">
                <div class="col-sm-4 no-margin">
                  <div class="profile_info_div">
                    <ul class="nav nav-tabs nav-stacked" role="tablist">
                      
                      <li role="presentation" class="active"><a href=".messagebox" aria-controls="messagebox" role="tab" data-toggle="tab"><i class="fa fa-envelope"></i> Contact Info</a></li>
                      <li role="presentation"><a href=".accountdetails" aria-controls="accountdetails" role="tab" data-toggle="tab"><i class="fa fa-university"></i> Password Change</a></li>
                      <li role="presentation"><a href=".credits" aria-controls="credits" role="tab" data-toggle="tab"><i class="fa fa-map"></i> Address Info</a></li>
                      <li role="presentation"><a href=".leavereview" aria-controls="leavereview" role="tab" data-toggle="tab"><i class="fa fa-edit"></i> About</a></li>
                      <!-- <li role="presentation"><a href=".customerservice" aria-controls="customerservice" role="tab" data-toggle="tab"><i class="fa fa-cog"></i> Setting</a></li> -->
                      <li role="presentation">
                        <a href="<?=l('account/report')?>"><i class="fa fa-certificate"></i> Report Card</a>
                      </li>

                      <li role="presentation">
                        <a href="<?=l('account/order')?>"><i class="fa fa-shopping-cart"></i> Order History</a>
                      </li>

                      <li role="presentation">
                        <a href="<?=l('account/quiz')?>"><i class="fa fa-question-circle-o"></i> Online Quiz</a>
                      </li>

                      <li role="presentation">
                        <a href="<?=quiz_url('')?>"><i class="fa fa-tachometer"></i> Quiz Portal</a>
                      </li>

                      <li role="presentation">
                        <a href="<?=lo('dashboard')?>"><i class="fa fa-th-list"></i> Online Class Room</a>
                      </li>
                    
                      <li role="presentation"><a href="<?=l('signout')?>"><i class="fa fa-user"></i> Logout</a></li>
                    </ul>
                  </div>

                </div>
              <div class="col-sm-8 no-margin">
                <div class="tab-content">
                  <!--[First Tab START]-->   
                  <? $this->load->view('account/_tab_contact_info')?>
                  <!--[First Tab END]-->  

                  <!--[2nd Tab START]-->   
                  <? $this->load->view('account/_tab_password')?>
                  <!--[2nd Tab END]-->  

                  <!--[3rd Tab START]-->   
                  <? $this->load->view('account/_tab_address')?>
                  <!--[3rd Tab END]-->  
                  
                  <!--[4th Tab START]-->   
                  <? $this->load->view('account/_tab_aboutus')?>
                  <!--[4th Tab END]-->  

                  
                </div>
              </div>
            </div>
          </div></div>
        </div>
      </div>
    </div>
  
</section>
</section>
<div class="clearfix"></div>