<style type="text/css">
#exampleModal1 ul li
{
  margin-left: 30px;

}  


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
</style>

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

            <li class="nx2"><i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepseventeen').'?query-id='.$queryid.'&key='.$key?>">Assets</a></li>

            <li class="nx3"><i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/stepnineteen').'?query-id='.$queryid.'&key='.$key?>">Income</a></li>

            <li class="active"><a href="<?=l('calculator_steps/stepfiftyone').'?query-id='.$queryid.'&key='.$key?>')?>">Real Estate</a></li>

         
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
          <a href="<?=l('calculator_steps/steptwentytwo').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting to Know You</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
                   

        <?   
        $loan = $this->model_loan->find_by_pk($queryid);
        ?> 

            <div class="few-prvd stp-5">
              <span>Tell us about the property you would like to purchase.</span>
            </div>
            <div class="strt-frmone">
               <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfiftyone')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <label>Property Type    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label>

              <select class="optnone" name="loan[loan_real_property_type]" required="">
              <?php if (!empty($loan['loan_real_property_type'])){ ?> 
               <option value="<?=$loan['loan_real_property_type']?>"><?=$loan['loan_real_property_type']?></option>

                <?php } else{?>  
                <option value="">- Select an Option</option>
                <option value="Single Family">Single Family</option>
                <option value="Condominium">Condominium</option>
                <option value="Townhouse">Townhouse</option>
                <option value="Two to Four Unit Property">Two to Four Unit Property</option>
                <option value="Cooperative">Cooperative</option>
                <option value="Manufactured Home">Manufactured Home</option>
                <option value="Commercial">Commercial</option>
                <?php } ?>
              </select>

              <label>Property Address</label>
              <input type="text" name="loan[loan_real_property_address]" required="" value="<?=$loan['loan_real_property_address']?>">

                <label>Property Value <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label>
              <input type="text" placeholder="$" name="loan[loan_real_value]" required="" value="<?=$loan['loan_real_value']?>" maxlength="15" pattern="\d*">


               <label>How do you currently use this property? </label>
              <select  name="loan[loan_real_current]" required="" id="mysel">
                      <?php if (!empty($loan['loan_real_current'])){ ?> 
               <option value="<?=$loan['loan_real_current']?>"><?=$loan['loan_real_current']?></option>

                <?php } else{?>  
                <option value="">- Select an Option</option>
                <option value="Primary Residence">Primary Residence</option>
                <option value="Second/Vacation Home">Second/Vacation Home</option>
                <option value="Investment/Rental Property">Investment/Rental Property</option>
                <?php } ?>
              </select>


              
               <label>How will you use this property after this transaction? </label>
              <select class="optnone" name="loan[loan_real_trans]" required="">
                      <?php if (!empty($loan['loan_real_trans'])){ ?> 
               <option value="<?=$loan['loan_real_trans']?>"><?=$loan['loan_real_trans']?></option>

                <?php } else{?>  
                <option value="">- Select an Option</option>
                <option value="Primary or vacation home">Primary or vacation home</option>
                <option value="Investment/Rental property">Investment/Rental property</option>
                <option value="Property is pending sale">Property is pending sale</option>
                  <option value="Property has been sold">Property has been sold</option>
                <?php } ?>
              </select>
   <input type="hidden" name="loan[loan_real_rental]" id="txt" value="<?=$loan['loan_real_rental']?>">
  
   <div id="my">
                <div class="crnt-inpt">
              <p>Do you receive rental income for this property?</p>
<div class="onoffswitch">
                    <input type="checkbox"  class="onoffswitch-checkbox" id="myonoffswitch5">
    <label class="onoffswitch-label" for="myonoffswitch5">
        <span class="onoffswitch-inner"></span>
        <span class="onoffswitch-switch"></span>
    </label>
</div></div>


   <div id="nextdiv">

              <label>Monthly Rent</label>
                 <input type="text" placeholder="$" name="loan[loan_real_month]"  value="<?=$loan['loan_real_month']?>" maxlength="15" pattern="\d*"></div>


            </div>
 



              
            <label>How many mortgages are on this property?</label>
              <input type="text" name="loan[loan_real_mortgages]" required="" value="<?=$loan['loan_real_mortgages']?>">

<!--            <label class="mail">I own this property with Lorem
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
                </label>
 -->
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

        <h1>What is the property type?</h1><br>
        <label>Single Family:</label><p>A free-standing structure that doesn’t share walls or doors with another building.</p>

       <label>Condominium:</label> <p>An individually-owned unit in a building or complex with multiple units.</p>

<label>Townhouse:</label> <p>A home that shares walls with other homes placed side-by-side.</p>
<label>Two to Four Unit Property:</label> <p>A building or complex with 2–4 units owned by the same person.</p>

<label>Cooperative:</label> <p>A building or complex owned by an organization that sells units as shares to the people who live there.</p>

<label>Manufactured Home:</label> <p>A type of housing built in one place and then moved somewhere else. (Mobile homes are the most common.)</p>
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

        <h1>What is the market value of the property?</h1><br>
        <p>Provide your best guess of what you could buy or sell this property for today. Comparing the home to similar, recently-sold properties can help you understand what the home is worth.</p><br>

        <p>Still have questions? Contact your loan team.</p>
       




      </div>
  
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
 //   $("#my").hide(); 

    // $('#mysel').change(function(){
    //     var option = $('option:selected').val();

    //    if(option=='Primary Residence'){
    //   alert("ok");
    //    $('#my').show();
    //  } 
    //  else  if(option=='Second/Vacation Home'){ 
    //    $('#my').show();
    //  } 
    //   else if(option=='Investment/Rental Property'){ 
    //    $('#my').hide();
    //  } 


    // });

          $('.crnt-inpt input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
               $("#nextdiv").show();
               $("#txt").val('Yes');  
            }
            else if($(this).prop("checked") == false){
                $("#nextdiv").hide();
                $("#txt").val('No');   
            }
        });


    });
</script>



