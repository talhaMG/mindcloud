<section class="fnsh-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
    <h2>Let's finish up your application</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod .</p>
    </div>
    </div>
  </div>
</section>



<section class="main-fnshtwo">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10 col-md-offset-1 fnsh-href">
      <div class="col-md-8 col-xs-12 col-sm-8">
        <div class="fnshtwo-bx">
          <h2 class="pull-left">Tasks</h2>
     <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfinish')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">


<button type="Submit" class="cntnu pull-right apfnsh" id="forms-contact_send-btn">Finish Application</button>  


  <!--         <a href="<?=l('calculator_steps/ajax_stepfinish').'?query-id='.$queryid.'&key='.$key?>" class="pull-right apfnsh">Finish Application</a>
 -->
        </form>

          <div class="clearfix"></div>
          <ul>
            <li><span>Getting to work</span></li>
            <li><span>Assets</span></li>
            <li><span>Income</span></li>
          </ul>
         <!--  <a href="#" class="shwmr">Show 4 more tasks</a> -->
        </div>

        <div class="fnshtwo-bxhng">

          <?
               $user_data = $this->layout_data['user_data'];   
              
              $param=array(); 
              $param['where']['loan_user_id']=$user_data['user_id'];
              $loan = $this->model_loan->find_one_active($param);
              

          ?>
          <h2>Tasks</h2>

<?php  if($loan['loan_approval_status']==0){ ?>
          <ul class="one">
            <li class="crntb"><span>CURRENT STEP</span></li>
            <li class="flout"><span>Fill Out application</span></li>
            <li class="aplfli"><span>Your approval is pending from admin side.</span></li>
          </ul>


 <?php } else{?>
  <ul class="two">
            <li class="crntb"><span>CURRENT STEP</span></li>
            <li class="flout"><span>Fill Out application</span></li>
            <li class="aplfli"><span>Your current step is successfully approved</span></li>
          </ul>

 <?php } ?>  
        </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-4">
        <div class="strt-lstfrm strt-lstfrmfg">
          <h3>Contact Us</h3>
              <h2>Calcore Mortgage</h2>
              <p>5900 Sepulveda Blvd Suite 280 </p>
              <ul>
                <li><a href="tel:1234-678-900"><i class="fa fa-phone" aria-hidden="true"></i>323 599-0101</a></li>
                <li><a href="mailto:Info@demolinks.com"><i class="fa fa-envelope" aria-hidden="true"></i>michaeltsypin@aol.com</a></li>
                <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i>www.calcoretmortgage.com</a></li>
              </ul>
            </div>
      </div>
      </div>
    </div>
  </div>
</section>

    
 