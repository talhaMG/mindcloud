
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
             <li><a href="<?=l('calculator_steps/stepfour').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>
            <li><a href="<?=l('calculator_steps/stepten').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>
            <li><a href="<?=l('calculator_steps/stepseventeen').'?query-id='.$queryid.'&key='.$key?>">Assets</a></li>
            <li class="active"><a href="<?=l('calculator_steps/stepnineteen').'?query-id='.$queryid.'&key='.$key?>">Income</a></li>
            
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
          <a href="<?=l('calculator_steps/steptwenty').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2> Income</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd">
              <span>Tell us about this Employment income.</span>
            </div>
            <div class="strt-frmone">

                  <?$loan = $this->model_loan->find_by_pk($queryid);
                  // debug($loan);
                  ?>
                  <form id="form-send_us" action="<?=l('calculator_steps/ajax_steptwenty')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <label>Employer Name</label>
              <input type="text" name="loan[loan_emp_name]" required="" value="<?=$loan['loan_emp_name']?>">


              <label>Employer Address</label>
              <input type="text" name="loan[loan_emp_address]" required="" value="<?=$loan['loan_emp_address']?>">


              <label>Employer Corporate Phone Number</label>
              <input type="tel" name="loan[loan_emp_phone]" required="" value="<?=$loan['loan_emp_phone']?>" id="phonenumber">



              <label>Start Date</label>
              <input type="date" name="loan[loan_emp_start_date]" required="" value="<?=$loan['loan_emp_start_date']?>">




              <label>Job Title</label>
              <input type="text" name="loan[loan_emp_job]" required="" value="<?=$loan['loan_emp_job']?>">



              <label>Years in Profession</label>
              <input type="text" name="loan[loan_emp_year]" required="" value="<?=$loan['loan_emp_year']?>" maxlength="2" pattern="\d*">



                
               <label>Pay Type</label>
              <select name="loan[loan_pay_type]" required="">
              <?php if (!empty($loan['loan_pay_type'])){ ?>    
               <option value="<?=$loan['loan_pay_type']?>"><?=$loan['loan_pay_type']?></option>
              <?php } else{?>  
                <option value="">Select an option</option>
                <option value="Salaried">Salaried</option>
                <option value="Hourly">Hourly</option>
                 <?php } ?>
              </select>



              <label>Hourly Rate </label>
              <input type="text" placeholder="$" name="loan[loan_hour_rate]" required="" value="<?=$loan['loan_hour_rate']?>" maxlength="15" pattern="\d*">



              <label># Hours / Week</label>
              <input type="text" name="loan[loan_hour_week]" required="" value="<?=$loan['loan_hour_week']?>" maxlength="15" pattern="\d*">

              
              <label>Annual Overtime (if applicable) </label>
              <input type="text" placeholder="$" name="loan[loan_annual_overtime]" required="" value="<?=$loan['loan_annual_overtime']?>" maxlength="15" pattern="\d*">

              <label>Annual Bonus (if applicable) </label>
              <input type="text" placeholder="$" name="loan[loan_annual_bonus]" required="" value="<?=$loan['loan_annual_bonus']?>" maxlength="15" pattern="\d*">

               <label>Annual Commission (if applicable)</label>
              <input type="text" placeholder="$" name="loan[loan_annual_commission]" required="" value="<?=$loan['loan_annual_commission']?>" maxlength="15" pattern="\d*">


        <button type="Submit" class="cntnu" id="forms-contact_send-btn">Continue</button>

<!--               <a href="<?=l('step-twentythree')?>" class="cntnu">Continue</a> -->


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
  
  $('#phonenumber').mask("(000) 000-0000");
   

    });
</script>  