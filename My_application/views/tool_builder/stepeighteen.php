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

            <li class="active"><a href="<?=l('calculator_steps/stepeighteen').'?query-id='.$queryid.'&key='.$key?>">Assets</a></li>

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
          <a href="<?=l('calculator_steps/stepseventeen').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Assets</h2>
        </div>

        <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
    
       <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepeighteen')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">
        <div class="few-prvd stp-9">
        <?   
        $loan = $this->model_loan->find_by_pk($queryid);
        ?> 
              <span>Include all cash, investment, and retirement accounts 
that you'll use for your down payment and closing costs.</span>
            </div>

            <div class="strt-frmone">
    
              <label>Enter your financial institution or choose from the options below</label>
              <input type="text" placeholder="" class="pasone" name="loan[loan_finance_institute]"  id="txt" value="<?=$loan['loan_finance_institute']?>">
            </div>



            <div class="bnk-lgo">
              <ul>
                <li>
                  <span><button id="one" type="button"><img src="<?=i('')?>bank1.jpg" class="img-responsive" alt="img"></button></span>
                </li>
                <li>
                  <span><button id="two" type="button"><img src="<?=i('')?>bank2.jpg" class="img-responsive" alt="img"></button></span>
                </li>
                <li>
                  <span><button id="three" type="button"><img src="<?=i('')?>bank3.jpg" class="img-responsive" alt="img"></button></span>
                </li>
                <li>
                  <span><button id="four" type="button"><img src="<?=i('')?>bank4.jpg" class="img-responsive" alt="img"></button></span>
                </li>

                <li>
                  <span><button id="five" type="button"><img src="<?=i('')?>bank5.jpg" class="img-responsive" alt="img"></button></span>
                </li>
                <li>
                  <span><button id="six" type="button"><img src="<?=i('')?>bank6.jpg" class="img-responsive" alt="img"></button></span>
                </li>
                <li>
                  <span><button id="seven" type="button"><img src="<?=i('')?>bank7.jpg" class="img-responsive" alt="img"></button></span>
                </li>
                <li>
                  <span><button id="eight" type="button"><img src="<?=i('')?>bank8.jpg" class="img-responsive" alt="img"></button></span>
                </li>
              </ul>
            </div>
                <div class="acnt-us">
            <a href="javascript:void(0)" class="mchafrd"><i class="fa fa-info-circle" aria-hidden="true"></i>What are the different types of accounts I can use?</a>
            <a href="javascript:void(0)" class="mchafrd"><i class="fa fa-info-circle" aria-hidden="true"></i>How is my data protected?</a>
<!--             <a href="<?=l('step-nineteen')?>" class="ast">I don't have any assets</a> -->
            <button type="Submit" class="ast" id="forms-contact_send-btn">I don't have any assets</button>  
            </div>
            </form>
        </div> 
        


        
      </div>
    </div>
    </div>
  </div>
</section>

<script type="text/javascript">
  
$(document).ready(function() {
 
 $("#one").click(function() {
 $("#txt").val("Bank Of America");
  });

  $("#two").click(function() {
 $("#txt").val("Chase");
  });
   $("#three").click(function() {
 $("#txt").val("Citi");
  });

    $("#four").click(function() {
 $("#txt").val("Wells Fargo");
  });
     $("#five").click(function() {
 $("#txt").val("Capital One Bank");
  });

 $("#six").click(function() {
 $("#txt").val("USAA");
});
 
 $("#seven").click(function() {
 $("#txt").val("U.S. Bank");
  });

$("#eight").click(function() {
 $("#txt").val("Navy Federal CU");
  });
 
});
</script>