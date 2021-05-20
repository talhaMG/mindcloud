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
            <li class="active tw"><a href="<?=l('calculator_steps/stepfortysix').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>
            
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
          <?$loan = $this->model_loan->find_by_pk($queryid);?> 
          <a href="<?=l('calculator_steps/stepfourteen').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd">
              <span> <?=$loan['loan_fname']?>, to process your online application, we’ll need  consent to the below terms.</span>
            </div>
            <div class="strt-frmone">
       
              
              <div class="mlng-adrs">
   
<label class="mail">I confirm that I have read and agree to the <a href="javascript:void(0)" class="trms"> Consent to Use Electronic Signatures and Records</a> on behalf of <?=$loan['loan_fname']?>.
  <input type="checkbox" checked="">
  <span class="checkmark"></span>
</label>

              </div>

              <a href="<?=l('calculator_steps/ajax_stepfortysix').'?query-id='.$queryid.'&key='.$key?>" class="cntnu">Continue</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
  