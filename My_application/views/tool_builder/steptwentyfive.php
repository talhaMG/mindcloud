
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

            <li class="active"><a href="<?=l('calculator_steps/steptwentyfive').'?query-id='.$queryid.'&key='.$key?>">Declarations</a></li>

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
           <?$loan = $this->model_loan->find_by_pk($queryid);
        //debug($loan);
          ?>
        <div class="gt-frmone">
          <a href="<?=l('calculator_steps/steptwentyfour').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Declarations</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            
            <div class="gtng-1 realst">

                <form id="form-send_us" action="<?=l('calculator_steps/ajax_steptwentyfive')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">   
        

        <input type="hidden" name="loan[loan_citizen]" id="txt" value="<?=$loan['loan_citizen']?>">

              <span class="abd">What is your U.S. citizenship status?</span>


                 <?php if ($loan['loan_citizen']=='U.S. Citizen'){ ?>  
                 <button type="Submit" class="cntnu" id="forms-contact_send-btn"><i class="fa fa-check" aria-hidden="true"></i>U.S. Citizen</button>
                <?php } else{?>  
                    <button type="Submit" class="cntnu" id="forms-contact_send-btn">U.S. Citizen</button>

                <?php } ?>


                <?php if ($loan['loan_citizen']=='Permanent Resident Alien'){ ?>  
                    <button type="Submit" class="cntnu" id="forms-contact_send-btn1"><i class="fa fa-check" aria-hidden="true"></i>Permanent Resident Alien</button>
                 
                <?php } else{?>  

                 <button type="Submit" class="cntnu" id="forms-contact_send-btn1">Permanent Resident Alien</button>


                <?php } ?>

                 <?php if ($loan['loan_citizen']=='Other'){ ?>  
                    <button type="Submit" class="cntnu" id="forms-contact_send-btn2"><i class="fa fa-check" aria-hidden="true"></i>Other</button>
                 
                <?php } else{?>  

                 <button type="Submit" class="cntnu" id="forms-contact_send-btn2">Other</button>


                <?php } ?>



                


   <!--            <a href="<?=l('calculator_steps/ajax_steptwentyfive').'?query-id='.$queryid.'&key='.$key?>" class="cntnu">U.S. Citizen</a>
              <a href="<?=l('calculator_steps/ajax_steptwentyfive').'?query-id='.$queryid.'&key='.$key?>" class="cntnu">Permanent Resident Alien</a>
              <a href="<?=l('calculator_steps/ajax_steptwentyfive').'?query-id='.$queryid.'&key='.$key?>" class="cntnu">Other</a> -->

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

$("#forms-contact_send-btn").click(function(){
$("#txt").val('U.S. Citizen');
});

$("#forms-contact_send-btn1").click(function(){
$("#txt").val('Permanent Resident Alien');
});

$("#forms-contact_send-btn2").click(function(){
$("#txt").val('Other');
});



});
</script> 
    


    

