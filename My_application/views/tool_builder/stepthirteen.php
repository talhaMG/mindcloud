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
            <li class="active tw"><a href="<?=l('calculator_steps/stepthirteen').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>

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
          <a href="<?=l('calculator_steps/steptwelve').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting to Know You</h2>
        </div>
        <div class="row">
        <?   
        $loan = $this->model_loan->find_by_pk($queryid);
        ?> 
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <div class="few-prvd stp-6">
              <span>Are you working with a real estate agent?</span>
            </div>
            <div class="strt-frmone stp-7">
              <div class="crnt-inpt">
                <p>Using a real estate agent?</p>
<div class="onoffswitch">
    <input type="checkbox" name="loan[loan_real_state_agent]" class="onoffswitch-checkbox" id="myonoffswitch" value="<?=$loan['loan_real_state_agent']?>">
    <label class="onoffswitch-label" for="myonoffswitch">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div>
              </div>
        <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepthirteen')?>">
               <div class="crnt-inpt" id="all2">

                </div>

                
              
              <div class="strt-frmone" id="all">
     <!--      <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepthirteen')?>">
      -->             
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <input type="hidden" name="loan[loan_refer_name]" value="<?=$loan['loan_refer_name']?>" id="txt">


              <label>Agent First Name </label>
              <input type="text" name="loan[loan_agent_fname]" value="<?=$loan['loan_agent_fname']?>">

               <label>Agent Last Name </label>
              <input type="text" name="loan[loan_agent_lname]" value="<?=$loan['loan_agent_lname']?>">

              <label>Agent Email </label>
              <input type="email" name="loan[loan_agent_email]" value="<?=$loan['loan_agent_email']?>">

              <label>Agent Phone </label>
              <input type="text" name="loan[loan_agent_phone]"  value="<?=$loan['loan_agent_phone']?>" id="phonenumber">
              </div>
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


<script type="text/javascript">
  $(document).ready(function(){
     $("#all").hide(); 
     $('#txt').val('No');
       $('#phonenumber').mask("(000) 000-0000");
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#all").show();
             //  $("#all2").hide();

             var a= $("#txt").val('Yes');
               
               console.log(a);
            }
            else if($(this).prop("checked") == false){
                $("#all").hide();
                //$("#all2").show(); 
              var a= $('#txt').val('No');
               
               console.log(a);
    
                
            }
        });
    });



</script>  


