
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
            <li class="active"><a href="<?=l('calculator_steps/stepthree').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>

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
         <a href="<?=l('calculator_steps/steptwo').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd stp-6">
              <span>Are you purchasing a new property or refinancing your mortgage?</span>
            </div>
            <div class="cntnu-btn prodnb strt-frmone">
                  <?$loan = $this->model_loan->find_by_pk($queryid);
                  // debug($loan);
                  ?>
                  <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepthree')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

                 <input type="hidden" name="loan[loan_trans]" id="txt" value="<?=$loan['loan_trans']?>">

                  <?php if ($loan['loan_trans']=='Purchase'){ ?>  
                 <button type="Submit" class="cntnu" id="forms-contact_send-btn"><i class="fa fa-check" aria-hidden="true"></i>Purchasing a new property</button>
                <?php } else{?>  
                    <button type="Submit" class="cntnu" id="forms-contact_send-btn">Purchasing a new property</button>

                <?php } ?>


                <?php if ($loan['loan_trans']=='Refinance'){ ?>  
                    <button type="Submit" class="cntnu" id="forms-contact_send-btn1"><i class="fa fa-check" aria-hidden="true"></i>Refinancing my mortgage</button>
                 
                <?php } else{?>  

                 <button type="Submit" class="cntnu" id="forms-contact_send-btn1">Refinancing my mortgage</button>


                <?php } ?>
                </form>
 

              <a href="<?=l('calculator_steps/ajax_stepthree1').'?query-id='.$queryid.'&key='.$key?>" id="three">Prequalification</a>
                
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

$("#forms-contact_send-btn").click(function(){
$("#txt").val('Purchase');
});

$("#forms-contact_send-btn1").click(function(){
$("#txt").val('Refinance');
});

// $("#three").click(function(){
// $("#txt").val('Prequalification');
// });


});
</script> 