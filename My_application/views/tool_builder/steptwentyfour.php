
<style type="text/css">

.getstrtpg-lst ul li.nx a:before {
    content: '';
    position: absolute;
    left: 20px;
    width: 12px;
    height: 12px;
    top: 23px;
    border: 2px solid transparent;
    border-radius: 50%;
}
.getstrtpg-lst ul li.nx1 a:before {
    content: '';
    position: absolute;
    left: 20px;
    width: 12px;
    height: 12px;
    top: 23px;
    border: 2px solid transparent;
    border-radius: 50%;
}

.getstrtpg-lst ul li.nx2 a:before {
    content: '';
    position: absolute;
    left: 20px;
    width: 12px;
    height: 12px;
    top: 23px;
    border: 2px solid transparent;
    border-radius: 50%;
}
.getstrtpg-lst ul li.nx a:before {
    content: '';
    position: absolute;
    left: 20px;
    width: 12px;
    height: 12px;
    top: 23px;
    border: 2px solid transparent;
    border-radius: 50%;
}
li.tw
{

 position: relative;

}
.getstrtpg-lst ul li.nx .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 18px;
    left: 54px;
    z-index: 9999;
}

.getstrtpg-lst ul li.nx1 .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 75px;
    left: 54px;
    z-index: 9999;
}
.fa-check:before {
    content: "\f00c";
}
.getstrtpg-lst ul li.nx2 .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 130px;
    left: 54px;
    z-index: 9999;
}
.getstrtpg-lst ul li.nx3 .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 190px;
    left: 54px;
    z-index: 9999;
}
.getstrtpg-lst ul li.nx3 a:before {
    content: '';
    position: absolute;
    left: 20px;
    width: 12px;
    height: 12px;
    top: 23px;
    border: 2px solid transparent;
    border-radius: 50%;
}

.getstrtpg-lst ul li.nx4 .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 240px;
    left: 54px;
    z-index: 9999;
}
.getstrtpg-lst ul li.nx4 a:before {
    content: '';
    position: absolute;
    left: 20px;
    width: 12px;
    height: 12px;
    top: 23px;
    border: 2px solid transparent;
    border-radius: 50%;
}
</style>


<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
             <li class="nx">
<i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepnine').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>

            <li class="nx1">
<i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepten').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>

            <li class="nx2">
<i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepseventeen').'?query-id='.$queryid.'&key='.$key?>">Assets</a></li>

            <li class="nx3">
<i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepnineteen').'?query-id='.$queryid.'&key='.$key?>">Income</a></li>

            <li class="nx4">
<i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/steptwentyone').'?query-id='.$queryid.'&key='.$key?>')?>">Real Estate</a></li>

            <li class="active"><a href="<?=l('calculator_steps/steptwentyfour').'?query-id='.$queryid.'&key='.$key?>">Declarations</a></li>

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
        <?$loan = $this->model_loan->find_by_pk($queryid);
       //  debug($loan);       
        ?> 
        <div class="gt-frmone">
          <a href="<?=l('calculator_steps/steptwentythree').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Declarations</h2>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd stp-17">
              <span> <?=$loan['loan_fname']?>, please answer the following questions about your financial history.</span>
            </div>
            <div class="strt-frmone stp-18">
             <form id="form-send_us" action="<?=l('calculator_steps/ajax_steptwentyfour')?>">

                    <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <div class="crnt-inpt one">
                <p>Are there any outstanding judgments against you?</p>
                   <input type="hidden" name="loan[loan_judgments]" id="txt1" value="<?=$loan['loan_judgments']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt two">
                <p>Have you been declared bankruptcy within the past 
7 years?</p>
     <input type="hidden" name="loan[loan_bankruptcy]" id="txt2" value="<?=$loan['loan_bankruptcy']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch1">
    <label class="onoffswitch-label" for="myonoffswitch1">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>
              <div class="crnt-inpt three">
                <p>Have you had property foreclosed upon or given 
title or deed in lieu thereof in the last 7 years?</p>
  <input type="hidden" name="loan[loan_foreclosed]" id="txt3" value="<?=$loan['loan_foreclosed']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch2">
    <label class="onoffswitch-label" for="myonoffswitch2">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt four">
                <p>Are you party to a lawsuit?</p>
                  <input type="hidden" name="loan[loan_lawsuit]" id="txt4" value="<?=$loan['loan_lawsuit']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch3">
    <label class="onoffswitch-label" for="myonoffswitch3">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt five">
                <p>Have you directly or indirectly been obligated on any 
loan which resulted in foreclosure, transfer of 
title in lieu of foreclosure, or judgment?</p>
        <input type="hidden" name="loan[loan_transfer_of_title]" id="txt5" value="<?=$loan['loan_transfer_of_title']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch4">
    <label class="onoffswitch-label" for="myonoffswitch4">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt six">
                <p>Are you presently delinquent or in default on any 
Federal debt or any other loan, mortgage, financial 
obligation, bond, or loan guarantee?</p>
    <input type="hidden" name="loan[loan_financial_obligation]" id="txt6" value="<?=$loan['loan_financial_obligation']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch5" >
    <label class="onoffswitch-label" for="myonoffswitch5">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt seven">
                <p>Are you obligated to pay alimony, child support, or 
separate maintenance?</p>
   <input type="hidden" name="loan[loan_child_support]" id="txt7" value="<?=$loan['loan_child_support']?>">

<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch6">
    <label class="onoffswitch-label" for="myonoffswitch6">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt eight">
                <p>Is any part of the down payment borrowed?</p>
                   <input type="hidden" name="loan[loan_payment_borrowed]" id="txt8" value="<?=$loan['loan_payment_borrowed']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch7">
    <label class="onoffswitch-label" for="myonoffswitch7">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>

              <div class="crnt-inpt nine">
                <p>Are you a co-maker or endorser on a note?</p>
        <input type="hidden" name="loan[loan_co_maker]" id="txt9" value="<?=$loan['loan_co_maker']?>">
<div class="onoffswitch">
    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch8">
    <label class="onoffswitch-label" for="myonoffswitch8">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
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
       $("#txt1").val('No');
       $("#txt2").val('No');
       $("#txt3").val('No');
       $("#txt4").val('No');
       $("#txt5").val('No'); 
       $("#txt6").val('No');
       $("#txt7").val('No');
       $("#txt8").val('No');
       $("#txt9").val('No');

       
         $('.crnt-inpt.one input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt1").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt1").val('No'); 
            
            }
        });

            $('.crnt-inpt.two input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt2").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt2").val('No'); 
            
            }
        });


            $('.crnt-inpt.three input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt3").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt3").val('No'); 
            
            }
        });

     

            $('.crnt-inpt.four input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt4").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt4").val('No'); 
            
            }
        });


            $('.crnt-inpt.five input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt5").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt5").val('No'); 
            
            }
        });


            $('.crnt-inpt.six input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt6").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt6").val('No'); 
            
            }
        });

            $('.crnt-inpt.seven input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt7").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt7").val('No'); 
            
            }
        });



            $('.crnt-inpt.eight input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt8").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt8").val('No'); 
            
            }
        });

           $('.crnt-inpt.nine input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#txt9").val('Yes'); 
               
            }
            else if($(this).prop("checked") == false){
             $("#txt9").val('No'); 
            
            }
        });







});
</script>
    
