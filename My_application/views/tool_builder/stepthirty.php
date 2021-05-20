
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
.getstrtpg-lst ul li.nx5 .fa {
    color: #1BBF88 !important;
    padding-right: 10px !important;
    font-size: 17px !important;
    /* position: absolute; */
    position: absolute;
    top: 300px;
    left: 54px;
    z-index: 9999;
}
.getstrtpg-lst ul li.nx5 a:before {
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

            <li class="nx5">
<i class="fa fa-check" aria-hidden="true"></i><a href="<?=l('calculator_steps/steptwentythree').'?query-id='.$queryid.'&key='.$key?>">Declarations</a></li>

            <li class="active"><a href="<?=l('calculator_steps/stepthirty').'?query-id='.$queryid.'&key='.$key?>">Demographic Info</a></li>
           
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
          <a href="<?=l('calculator_steps/steptwentynine').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Demographic Info</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <?$loan = $this->model_loan->find_by_pk($queryid);?>   
            <div class="gtng-1 step-78">
              
              <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepthirty')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <span class="abd"><?=$loan['loan_fname']?>, what race(s) do you identify with?</span>
              <span class="anthr">Please select all options that apply to you.</span>
              <div class="mlng-adrs step-77">
                <p>Which race(s) do you identify with?</p>
                <label class="mail">American Indian or Alaska Native
  <input type="radio" name="loan[loan_american]" value="American Indian or Alaska Native" checked="">
  <span class="checkmark"></span>
</label>

<div class="exmpl-etc">
                <input type="text" >
                <span>Enter name of enrolled or principal tribe.</span>
              </div>
               <label class="mail">Asian
  <input type="radio"  name="loan[loan_american]" value="Asian" checked="">
  <span class="checkmark"></span>
</label>


<div class="mexcn">
<label class="mail">Asian Indian
  <input type="radio" name="loan[loan_asian]" value="Asian Indian">
  <span class="checkmark"></span>
</label>
<label class="mail">Chinese
  <input type="radio" name="loan[loan_asian]" value="Chinese">
  <span class="checkmark"></span>
</label>
<label class="mail">Filipino
  <input type="radio" name="loan[loan_asian]" value="Filipino">
  <span class="checkmark"></span>
</label>
<label class="mail">Japanese
  <input type="radio" name="loan[loan_asian]" value="Japanese">
  <span class="checkmark"></span>
</label>
<label class="mail">Korean
  <input type="radio" name="loan[loan_asian]" value="Korean">
  <span class="checkmark"></span>
</label>
<label class="mail">Vietnamese
  <input type="radio" name="loan[loan_asian]" value="Vietnamese">
  <span class="checkmark"></span>
</label>
<label class="mail">Other Asian
  <input type="radio" name="loan[loan_asian]" value="Other Asian">
  <span class="checkmark"></span>
</label>
</div>

              </div>

              <div class="exmpl-etc">
                <input type="text">
                <span><b>Examples:</b>  Hmong, Laotian, Thai, Pakistani, Cambodian, etc.</span>
              </div>
              <div class="mlng-adrs">
                <label class="mail">Black or African American
  <input type="radio" name="loan[loan_american]" value="Black or African American" checked="">
  <span class="checkmark"></span>
</label>
<label class="mail">Native Hawaiian or Other Pacific Islander
  <input type="radio" name="loan[loan_american]" value="Native Hawaiian or Other Pacific Islander" checked="">
  <span class="checkmark"></span>
</label>

<div class="mexcn">
<label class="mail">Native Hawaiian
  <input type="radio" name="loan[loan_native]" value="Native Hawaiian">
  <span class="checkmark"></span>
</label>
<label class="mail">Guamanian or Chamorro
  <input type="radio" name="loan[loan_native]" value="Guamanian or Chamorro">
  <span class="checkmark"></span>
</label>
<label class="mail">Samoan
  <input type="radio" name="loan[loan_native]" value="Samoan">
  <span class="checkmark"></span>
</label>
<label class="mail">Other Pacific Islander
  <input type="radio" name="loan[loan_native]" value="Other Pacific Islander">
  <span class="checkmark"></span>
</label>
</div>


              </div>

              <div class="exmpl-etc">
                <input type="text">
                <span><b>Examples:</b>  Fijian, Tongan, etc.</span>
              </div>
              <div class="mlng-adrs">
                <label class="mail">White
  <input type="radio" name="loan[loan_american]" value="White" checked="">
  <span class="checkmark"></span>
</label>
<label class="mail">Do not wish to provide
  <input type="radio" name="loan[loan_american]" value="Do not wish to provide" checked="">
  <span class="checkmark"></span>
</label>

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