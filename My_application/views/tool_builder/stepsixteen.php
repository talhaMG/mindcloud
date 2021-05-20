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
            <li class="active tw"><a href="<?=l('calculator_steps/stepsixteen').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>
              
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
          <a href="<?=l('calculator_steps/stepfortysix').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
                
              <? 
              $loan = $this->model_loan->find_by_pk($queryid);

             // debug($loan);
              $param=array();
              $param['where']['user_id']=$loan['loan_user_id'];
              $u = $this->model_user->find_one_active($param); 

              //debug($u);
          
              ?>
         
            <div class="revw-txt">
              <span>Review and confirm your information.</span>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img45.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Property Info</h2>
                    <p><?=$loan['loan_property_type']?></p>
                    <p><?=$loan['loan_property_use']?></p>
                    <p><?=$loan['loan_property_county']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepeleven').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img48.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Loan Info</h2>
                    <p><?='$'.$loan['loan_purchase_price'] .' purchase price'?></p>
                    <p><?='$'.$loan['loan_loan_value'] .' loan amount'?></p>
                    <p><?='$'.$loan['loan_down_payment'] .' down payment'?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/steptwelve').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img49.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Real Estate Agent</h2>
                    <p><?=$loan['loan_refer_name']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepthirteen').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img50.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2><?=$loan['loan_co_applicantfname']?> - Personal Information</h2>
                    <p>⁎⁎/⁎⁎/⁎⁎⁎⁎</p>
                    <p>⁎⁎⁎-⁎⁎-⁎⁎⁎⁎</p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepfourteen').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="cntnu-btn">
                  <a href="<?=l('calculator_steps/ajax_stepsixteen').'?query-id='.$queryid.'&key='.$key?>">Continue</a>
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
  
