
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
             <li class="active"><a href="<?=l('calculator_steps/stepfour').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>
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
          <a href="<?=l('calculator_steps/ajax_steptwo').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd">
              <span>Please provide a few details about yourself.</span>
            </div>
            <div class="strt-frmone">
                  <?   
                  $loan = $this->model_loan->find_by_pk($queryid );
                  //debug($loan);
                  

                  ?> 
                <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfour')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <label>Legal First Name *</label>
              <input type="text"  name="loan[loan_fname]" required="" value="<?=$loan['loan_fname']?>">

              <label>Middle Name</label>
              <input type="text" name="loan[loan_midname]" value="<?=$loan['loan_midname']?>">

              <label>Legal Last Name *</label>
              <input type="text" name="loan[loan_lname]" required="" value="<?=$loan['loan_lname']?>">

              <label>Suffix </label>
              <input type="text" class="sflx" name="loan[loan_suffix]"  value="<?=$loan['loan_suffix']?>">
              <span class="exmple">Examples: Jr., Sr., III, IV, etc.</span>

           <!--    <label>Email Address</label>
              <input type="text">

              <label>Confirm Email Address</label>
              <input type="text"> -->

              <label>Phone Number</label>
              <input type="text" name="loan[loan_phone]" required="" value="<?=$loan['loan_phone']?>" id="phonenumber"> 

              <label>Marital Status<i class="fa fa-info-circle" aria-hidden="true"></i></label>
              <select name="loan[loan_marital_status]" required="">
                  <?php if (!empty($loan['loan_marital_status'])){ ?>    
               <option value="<?=$loan['loan_marital_status']?>"><?=$loan['loan_marital_status']?></option>
              <?php } else{?>  
                <option value="">- Select an option</option>
                 <option value="Single">- Single</option>
                  <option value="Married">-Married</option>
                   <option value="Separated">-Separated</option>
                <?php } ?>
              </select>

              <div class="crnt-inpt all">
                <p>Are you currently an active military personnel, a veteran, 
or a surviving spouse?</p>
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_military]" class="onoffswitch-checkbox" id="myonoffswitch" value="<?=$loan['loan_military']?>">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>

<input type="text" name="businessSite" id="field1">
              </div>


              <div id="nextdiv">
        <label>What is your current military status?<i class="fa fa-info-circle" aria-hidden="true"></i></label>
              <select name="loan[loan_personal_status]">

                   <?php if (!empty($loan['loan_personal_status'])){ ?>    
               <option value="<?=$loan['loan_personal_status']?>"><?=$loan['loan_personal_status']?></option>
              <?php } else{?>  
                <option value="">- Select an option</option>
                 <option value="Active Duty">Active Duty</option>
                  <option value="National Guard">National Guard</option>
                  <option value="Reserves">Reserves</option>
                  <option value="Veteran">Veteran</option>
                  <option value="Surviving spouse">Surviving spouse</option>
                <?php } ?>


              </select>
  <div class="crnt-inpt mytxt">
              <p>Have you ever had a VA loan?</p>
              <input type="hidden" name="loan[loan_personal_loan_status]" id="mytxt" value="<?=$loan['loan_personal_loan_status']?>">
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_personalvaloan]" class="onoffswitch-checkbox" id="myonoffswitch5" 
value="<?=$loan['loan_personalvaloan']?>"
>
    <label class="onoffswitch-label" for="myonoffswitch5">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div></div>



</div>
               
               
              <label>Current Address</label>
              <input type="text" name="loan[loan_address]" required="" value="<?=$loan['loan_address']?>">

              <div id="add">  
              <label>Mailing Address</label>
              <input type="text" name="loan[loan_mail_add]"  value="<?=$loan['loan_mail_add']?>"></div>

              
              <div class="mlng-adrs">
                <label class="mail">Same as mailing address
  <input type="checkbox" checked="checked"  value="1" name="loan[loan_same]">
  <span class="checkmark"></span>
</label>
<label class="mail">I confirm that I have read and agree to the <a href="javascript:void(0)" class="trms">Terms Of Use, Privacy 
Policy, and Consent to Use Electronic Signatures and Records.</a>
  <input type="checkbox"  checked="checked" value="1" name="loan[loan_terms]">
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
  $('#phonenumber').mask("(000) 000-0000");
    // $('#MoveInDate').datetimepicker({
    //     defaultDate: '1925/01/01',
    //     timepicker:false,
    //     format:'Y-m-d',
    //     startDate:'+1971/05/01'//or 1986/12/08
    // });

         $('.crnt-inpt.all input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#nextdiv").show(); 
            }
            else if($(this).prop("checked") == false){
                $("#nextdiv").hide(); 
            }
        });

            $('.crnt-inpt.mytxt input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               
               $("#mytxt").val('VA loan-Yes');
            }
            else if($(this).prop("checked") == false){
              $("#mytxt").val('Never had VA loan'); 
            }
        });




    });
</script>






