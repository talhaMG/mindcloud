
<style type="text/css">
i.fa.fa-check {
    padding-right: 13px;
}  


</style>
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
              <li class="active"><a href="<?=l('calculator_steps/stepfive').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>

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
          <a href="<?=l('calculator_steps/stepfour').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            
            <div class="gtng-1">
             <?   
             $loan1 = $this->model_loan->find_by_pk($queryid);
             //debug($loan1);

             ?> 
              <span class="abd">Thanks, <?=$loan1['loan_fname']?></span>
              <span class="anthr">Are you applying for this loan with another applicant?</span>
              <a href="javascript:void(0)" class="mrpopl"><i class="fa fa-info-circle" aria-hidden="true"></i>What if I'm applying with 3 or more people?</a>
    <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfive')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <input type="hidden" name="loan[loan_apply_someone]" id="txt" value="loan[loan_apply_someone]">
            


   <!--         <button type="Submit" class="cntnu" id="forms-contact_send-btn">Yes</button>  -->
                        <?php if ($loan1['loan_apply_someone']=='Yes'){ ?>  
               <button type="Submit" class="cntnu" id="forms-contact_send-btn"><i class="fa fa-check" aria-hidden="true"></i>Yes</button> 
                <?php } else{?>  
                      <button type="Submit" class="cntnu" id="forms-contact_send-btn">Yes</button> 

                <?php } ?>
          
    
          </form>
          <a href="<?=l('calculator_steps/ajax_stepfive1').'?query-id='.$queryid.'&key='.$key?>" class="cntnu">No</a>
     
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

//$('#txt').val('No');
$("#forms-contact_send-btn").click(function(){
 $('#txt').val('Yes');
});

});
</script> 