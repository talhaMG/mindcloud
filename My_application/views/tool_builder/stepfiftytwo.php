<style type="text/css">
 button#one,button#two,button#three,button#four,button#five,button#six,button#seven,button#eight{
    height: 100px;
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
#exampleModal1 ul li
{
  margin-right: 30px;

}  
.strt-frmone label i {
    padding-left: 5px;
    padding-right: 10px;
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

          <li class="nx1"><i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepten').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>

          <li class="active"><a href="<?=l('calculator_steps/stepfiftytwo').'?query-id='.$queryid.'&key='.$key?>">Assets</a></li>

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
          <a href="<?=l('calculator_steps/stepeighteen').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2> Assets</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd">
              <span>You've opted out of automatic data retrieval for this bank. Please enter it manually.</span>
            </div>
               <div class="few-prvd">
                 <?$loan = $this->model_loan->find_by_pk($queryid);
                   //debug($loan);
                 ?>  
              <span><?=$loan['loan_fname']?>, please add your Bank  Accounts, and indicate which ones are shared. If you don't know your exact account balance, an estimate is fine.</span>
            </div>
            <div class="strt-frmone">

               
                  <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfiftytwo')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

               <label>Bank  - Checking</label><br><br>
                
               <label>Account Type</label>
              <select name="loan[loan_bank_account_type]" required="">
              <?php if (!empty($loan['loan_bank_account_type'])){ ?>    
               <option value="<?=$loan['loan_bank_account_type']?>"><?=$loan['loan_bank_account_type']?></option>
              <?php } else{?>  
                <option value="">Select an option</option>
                <option value="Checking">Checking</option>
                <option value="Brokerage">Brokerage</option>
                <option value="Retirement">Retirement</option>
                <option value="Savings">Savings</option>
                <option value="Trust">Trust</option>
                <option value="Certificate of Deposit">Certificate of Deposit</option>
                <option value="Money Market">Money Market</option>
                <option value="Annuity">Annuity</option>
                <option value="Other">Other</option>

                 <?php } ?>
              </select>



              <label>Account Balance</label>
              <input type="text" placeholder="$" name="loan[loan_account_balance]" required="" value="<?=$loan['loan_account_balance']?>" maxlength="15" pattern="\d*">



                  <label><i class="fa fa-info-circle" aria-hidden="true"></i>Which assets should I include?    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal1"></a></label>

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

        <h1>Which assets should I include?</h1><br>
        <p>Include all assets that you will use for your down payment (if purchasing a new home) and other costs associated with closing your mortgage. In addition, some products require you to have sufficient assets as reserves. Common asset types include:</p><br>
       
        <ul>
        <li><p>Cash accounts (checking, savings, money market, certificate of deposit, etc.)</p></li>

       <li><p>Investment accounts (stocks/bonds, brokerage, etc.)</p></li>

<li><p>Retirement accounts (IRA, 401k, 403b)</p></li>
</ul><br>

<p>Still have questions? Contact your loan team.</p>



      </div>
  
    </div>
  </div>
</div>

