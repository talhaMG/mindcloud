
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
           
              <li class="active"><a href="<?=l('calculator_steps/stepfortyfive').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>

            <li><a href="JavaScript:void(0)">Getting to Know You</a></li>
            <li><a href="JavaScript:void(0)">Assets</a></li>
            <li><a href="JavaScript:void(0)">Income</a></li>
            <li><a href="JavaScript:void(0)">Real Estate</a></li>
            <li><a href="JavaScript:void(0)">Declarations</a></li>
            <li><a href="JavaScript:void(0)">Demographic Info</a></li>
            <li><a href="JavaScript:void(0)">Additional Questions</a></li>

       

          </ul>
        </div>
        <div class="trm-ustxt">
          <a href="javascript:void(0)">Terms of Use</a>
          <span>|</span>
          <a href="javascript:void(0)">Privacy Policy</a>
        </div>
      </div>
      <div class="col-md-9 col-xs-12 col-sm-9">
        
        <div class="gt-frmone">
          <a href="<?=l('calculator_steps/stepfive').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd">
              <span>Please provide a few details about yourself.</span>
            </div>
            <div class="strt-frmone">
              

           <?   
           $loan = $this->model_loan->find_by_pk($queryid);
           ?> 
              <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfortyfive')?>">
              
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">
  
                
              <label>Co-applicant Legal First Name *</label>
              <input type="text" name="loan[loan_co_applicantfname]" required="" value="<?=$loan['loan_co_applicantfname']?>">

              <label>Co-applicant Middle Name</label>
              <input type="text" name="loan[loan_co_applicantmidname]" value="<?=$loan['loan_co_applicantmidname']?>">

              <label>Co-applicant Legal Last Name *</label>
              <input type="text" name="loan[loan_co_applicantlname]" required="" value="<?=$loan['loan_co_applicantlname']?>">

              <label>Co-applicant Suffix</label>
              <input type="text" class="sflx" name="loan[loan_co_applicantsuffix]" value="<?=$loan['loan_co_applicantsuffix']?>"> 
              <span class="exmple">Examples: Jr., Sr., III, IV, etc.</span>

              <label>Co-applicant Email Address *</label>
              <input type="email" name="loan[loan_co_applicantemail]" required="" value="<?=$loan['loan_co_applicantemail']?>">

           <!--    <label>Confirm Email Address</label>
              <input type="text"> -->

              <label>Co-applicant Phone Number *</label>
              <input type="tel" name="loan[loan_co_applicantphone]"  required=""   value="<?=$loan['loan_co_applicantphone']?>" id="phonenumber">

              <label>Co-applicant Marital Status *</label>
              <select name="loan[loan_co_applicantmarital_status]" required="">

                   <?php if (!empty($loan['loan_co_applicantmarital_status'])){ ?>    
               <option value="<?=$loan['loan_co_applicantmarital_status']?>"><?=$loan['loan_co_applicantmarital_status']?></option>
              <?php } else{?>  
                <option value="">- Select an option</option>
                 <option value="Single">- Single</option>
                  <option value="Married">-Married</option>
                  <option value="Separated">-Separated</option>
                <?php } ?>


              </select>

              <div class="crnt-inpt all">
                <p>Is this person currently an active military personnel, a veteran, or a surviving spouse?</p>
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_co_applicantmilitary]" class="onoffswitch-checkbox" id="myonoffswitch" 
value="<?=$loan['loan_co_applicantmilitary']?>"
>
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

<div id="nextdiv">
        <label>What is your current military status?<i class="fa fa-info-circle" aria-hidden="true"></i></label>
              <select name="loan[loan_co_applicantmilitary_status]">

                   <?php if (!empty($loan['loan_co_applicantmilitary_status'])){ ?>    
               <option value="<?=$loan['loan_co_applicantmilitary_status']?>"><?=$loan['loan_co_applicantmilitary_status']?></option>
              <?php } else{?>  
                <option value="">- Select an option</option>
                 <option value="Active Duty">Active Duty</option>
                  <option value="National Guard">National Guard</option>
                  <option value="Reserves">Reserves</option>
                  <option value="Veteran">Veteran</option>
                  <option value="Surviving spouse">Surviving spouse</option>
                <?php } ?>


              </select>
  <div class="crnt-inpt">
              <p>Have you ever had a VA loan?</p>
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_co_applicantvaloan]" class="onoffswitch-checkbox" id="myonoffswitch5" 
value="<?=$loan['loan_co_applicantvaloan']?>"
>
    <label class="onoffswitch-label" for="myonoffswitch5">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div></div>



</div>



                     <div class="crnt-inpt thr">
                <p>Do you live with this person?</p>
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_co_applicantlive]" class="onoffswitch-checkbox" id="myonoffswitch1" 
value="<?=$loan['loan_co_applicantlive']?>"
>
    <label class="onoffswitch-label" for="myonoffswitch1">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>


              </div>
             
              <div id="thr">
              <label>Co-applicant Current Address</label>
              <input type="text" name="loan[loan_co_applicantaddress]" value="<?=$loan['loan_co_applicantaddress']?>"></div>

              
              <div class="mlng-adrs">

              <div id="add">  
              <label>Mailing Address</label>
              <input type="text" name="loan[loan_co_mail_add]"  value="<?=$loan['loan_co_mail_add']?>"></div>


                <label class="mail">Same as mailing address
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
                </label>

              </div>
              
              <button type="Submit" class="cntnu" id="forms-contact_send-btn">Continue</button>

            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  $(document).ready(function(){
     $("#add").hide();
    $("#nextdiv").hide(); 

        $('.mlng-adrs input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#add").hide(); 
            }
            else if($(this).prop("checked") == false){
                $("#add").show(); 
            }
        });

          $('.crnt-inpt.all input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#nextdiv").show(); 
            }
            else if($(this).prop("checked") == false){
                $("#nextdiv").hide(); 
            }
        });

          $('.crnt-inpt.thr input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#thr").hide(); 
            }
            else if($(this).prop("checked") == false){
                $("#thr").show(); 
            }
        });
         $('#phonenumber').mask("(000) 000-0000");   

    });
</script>



  