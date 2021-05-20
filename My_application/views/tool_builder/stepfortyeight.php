<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
              <li class="active"><a href="<?=l('calculator_steps/stepfortyeight').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>
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
          <h2>Getting to Know You</h2>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd stp-6">
              <span>Tell us about the loan you would like to obtain.</span>
              <span>If you don't know the exact amount, an estimate is fine.</span>
            </div>
            <div class="strt-frmone stp-7">
        <?   
        $loan = $this->model_loan->find_by_pk($queryid);
        ?> 
                    <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfortyeight')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <label>Approximate property value</label>
              <input type="text" placeholder="$" name="loan[loan_property_value]" required="" maxlength="15" pattern="\d*" value="<?=$loan['loan_property_value']?>">

           
              <div class="crnt-inpt sec">
                    <p>Are you looking to cash out? </p>
                     <div class="onoffswitch">
                     <input type="checkbox" name="loan[loan_cash_out]" class="onoffswitch-checkbox" id="myonoffswitch8">
                      <label class="onoffswitch-label" for="myonoffswitch8">
                      <span class="onoffswitch-inner"></span>
                      <span class="onoffswitch-switch"></span>
                     </label>
                     </div>
              </div>


               <div class="strt-frmone" id="all">
              <label>Cash Amount </label>
              <input type="text" name="loan[loan_cash_amount]" maxlength="15" pattern="\d*" value="<?=$loan['loan_cash_amount']?>"></div>

              <label>Loan Amount</label>
              <input type="text" placeholder="$" name="loan[loan_loan_value]" required="" maxlength="15" pattern="\d*" value="<?=$loan['loan_loan_value']?>"> 
             
                  
                   <button type="Submit" class="cntnu" id="forms-contact_send-btn">Continue</button>  
           <!-- 
               <button type="Submit" class="cntnu" id="forms-contact_send-btn">Continue</button> -->
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
     $("#all").hide(); 
        $('.sec input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#all").show(); 
            }
            else if($(this).prop("checked") == false){
                $("#all").hide(); 
            }
        });
    });
</script>

