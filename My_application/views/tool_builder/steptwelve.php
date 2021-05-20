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
li.tw
{

 position: relative;

}
.getstrtpg-lst ul li .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 18px;
    left: 54px;
    z-index: 9999;
}
.fa-check:before {
    content: "\f00c";
}


</style>
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
              <li class="nx"><i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepnine').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>
            <li class="active tw"><a href="<?=l('calculator_steps/steptwelve').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>
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
          <a href="<?=l('calculator_steps/stepeleven').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
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
              <form id="form-send_us" action="<?=l('calculator_steps/ajax_steptwelve')?>">
                  
              <input type="hidden" name="id" value="<?=$queryid?>">
              <input type="hidden" name="key" value="<?=$key?>">
              <label>Purchase Price</label>
              <input type="phone" placeholder="$" name="loan[loan_purchase_price]" required="" maxlength="15" pattern="\d*" value="<?=$loan['loan_purchase_price']?>">

              <label>Down Payment</label>
              <input type="phone" placeholder="$" name="loan[loan_down_payment]" required="" maxlength="15" pattern="\d*" value="<?=$loan['loan_down_payment']?>">
              <label>Loan Amount</label>
              <input type="phone" placeholder="$" name="loan[loan_loan_value]" required="" maxlength="15" pattern="\d*" value="<?=$loan['loan_loan_value']?>">
              <div class="crnt-inpt">
                <p>Is any part of the down payment a gift?</p>
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_down_payment_gift]" class="onoffswitch-checkbox" id="myonoffswitch" checked 
value="<?=$loan['loan_down_payment_gift']?>">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
   </div>
</div>



            <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="mchafrd"><i class="fa fa-info-circle" aria-hidden="true"></i>How much can I afford?</a>
               <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal1" class="mchafrd12"><i class="fa fa-info-circle" aria-hidden="true"></i>What is considered a gift?</a>
              <button type="Submit" class="cntnu" id="forms-contact_send-btn">Continue</button>  
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Additional Help</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h1>How much can I afford?</h1><br>
        <p>If you do not know the purchase price of the property you wish to buy, type in your best estimate.</p>

        <p>The key factors in determining what you can afford are:</p>

     <label>Income:</label> <p>Money that you receive on a regular basis, from sources like your salary, investments, or interest.</p>

<label>Funds available:</label> <p>Cash that you have available to cover your down payment and other costs required to close the loan.</p>

<label>Debt:</label> <p>Any recurring payments you make, such as credit card or student loan payments.</p>

<label>Credit:</label> <p>Your credit score, along with other factors, will impact the interest rate you can get, which will impact your monthly payment.</p>


<br>
<p>Still have questions? Contact your loan team.</p>



      </div>
  
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Additional Help</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <h1>What is considered a gift?</h1><br>

        <p>A gift is a transfer made from a third party account in which no repayment is expected or implied. A gift can help you qualify for a loan.</p><br>
       
    

<p>Still have questions? Contact your loan team.</p>



      </div>
  
    </div>
  </div>
</div>

