<?$this->load->view("widgets/inner_banner")?>

<style type="text/css">

input#defaultForm-email {
    width: 100%;
    padding: 25px 14px;
    line-height: 20px;
    position: relative;
    border: none;
    border: 1px solid #94ca2e;
    margin: 13px 0px;
}

button#forgot_password-btn {
    padding: 15px 30px;
    border: 1px solid #94ca2e;
    color: #826767;
    text-transform: uppercase;
    background-color: transparent;
    margin: 10px 0px 55px 0px;
}

.InnerBanner {
    background: url(<?= i('') ?>innerBanner.jpg) top left/cover no-repeat !important;
}

  h3{
        text-align: center;
    margin-top: 3em;
    text-transform: uppercase;
  }
</style>


<section class="login fomrz">
  <div class="container"> 
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
       
 
      
      <div class="form_body">
        <div class="socialArea">
          <h3> <?=$title?> </h3>
        </div>

        <div class="sign-in-sec">

        <form id="forms-forgot_password">
          <div class="md-form mb-5">
            <input type="email" required name="forgot_password[user_email]" id="defaultForm-email" class="form-control validate" placeholder="Email">
          </div>
          <div class="buttonssubmit">
            <button id='forgot_password-btn' type="submit" value="Forgot Password" class="sign-btn submit">SUBMIT</button>
          </div>
        </form>
      </div>

     </div>







      </div>
    </div>


  </div>
</section>


