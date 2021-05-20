
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

            <li class="active"><a href="<?=l('calculator_steps/steptwentysix').'?query-id='.$queryid.'&key='.$key?>">Declarations</a></li>

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
          <a href="<?=l('calculator_steps/steptwentyfive').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Declarations</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <?
                
             $loan = $this->model_loan->find_by_pk($queryid);
                    
            ?>
            <div class="revw-txt">
              <span>Review and confirm your information.</span>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img63.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Financial Situation</h2>
                    <p><?=$loan['loan_judgments'].' '?>outstanding judgments</p>
                    <p><?=$loan['loan_bankruptcy'].' '?>bankruptcies</p>
                    <p><?=$loan['loan_foreclosed'].' '?>foreclosures</p>
                    <p><?=$loan['loan_lawsuit'].' '?>party to a lawsuit</p>
                    <p><?=$loan['loan_transfer_of_title'].' '?>obligated on any loans</p>
                    <p><?=$loan['loan_financial_obligation'].' '?>delinquent or in default</p>
                    <p><?=$loan['loan_child_support'].' '?>obligated to pay alimony, child support, or separate maintenance</p>
                    <p><?=$loan['loan_payment_borrowed'].' '?>borrowing for the down payment</p>
                    <p><?=$loan['loan_co_maker'].' '?>a co-maker or endorser</p>
         
               
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/steptwentyfour').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img64.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Citizenship</h2>
                    <p><?=$loan['loan_citizen']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/steptwentyfive').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="cntnu-btn">
                  <a href="<?=l('calculator_steps/ajax_steptwentysix').'?query-id='.$queryid.'&key='.$key?>">Continue</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>




