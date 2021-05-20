 <style type="text/css">
   .certi span.name{
   font-size: 36px;
    font-weight: 900;
    text-transform: capitalize;
    color: #8F0728;
    display: table;
    position: absolute;
    top: 33%;
    left: 37%;
  }
  .certi span.course_title{
      font-size: 36px;
    font-weight: 900;
    text-transform: capitalize;
    color: #0B2769;
    display: table;
    position: absolute;
    top: 50%;
    left: 20%;
  }
.certi span.completion_date{
    font-size: 19px;
    text-transform: capitalize;
    color: #353535;
    display: table;
    position: absolute;
    top: 69%;
    left: 72%;
}

   .certi span.course_tracking_number{
       font-size: 13px;
    text-transform: capitalize;
    color: #353535;
    display: table;
    position: absolute;
    top: 82%;
    left: 59%;
  } 
 .certi span.ce_provider{
     font-size: 13px;
    text-transform: capitalize;
    color: #353535;
    display: table;
    position: absolute;
    top: 84%;
    left: 56%;
  } 

  .certi span.certificate_number{
    font-size: 13px;
    text-transform: capitalize;
    color: #353535;
    display: table;
    position: absolute;
    top: 18.5%;
    left: 79%;
  } 
</style>

 <!-- Begin: Crousel -->
    <div class="ban">
      <h2>Verify</h2>
    </div>
    <!-- END: Crousel -->

    
    <section class="verifyCertificate">
      <div class="container"> 
        <div class="row">
          <div class="col-md-6 col-sm-6 col-sm-12">
            <p>Near the top right you will find a certificate number. Enter the number in the field below and press the Validate button.</p>
            <form id="forms-verify">
              <input type="text" class="form-control" placeholder="Certificate Number ex:001X-12XX" name="certificate_number" required="" value="<?=$_GET['certificate-number']?>">
              <button class="btnStyle" type="submit" id="verify-btn">Validate</button>
            </form>
          </div>
          <div class="col-md-6 col-sm-6 col-sm-12">
            
            <!-- <img src="<?=i('')?>certificate.jpg" alt="" class="img-responsive"> -->
          <div class="certi">
            <span class="name"><?=$username?></span>
            <span class="course_title"><?=$course_title?></span>
            <span class="certificate_number"><?=$certificate_number?></span>
            <span class="course_tracking_number"><?=$course_tracking_number?></span>
            <span class="completion_date"><?=$completion_date?></span>
            <span class="ce_provider"><?=$ce_provider?></span>
            <img src="<?=i('')?>certificate_pdf.jpg" alt="" class="img-responsive img-center">
          </div> 

          </div>
        </div>
      </div>
    </section>