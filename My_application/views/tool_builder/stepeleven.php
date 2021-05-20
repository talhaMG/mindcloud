<style type="text/css">
#exampleModal1 ul li
{
  margin-left: 30px;

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
            <li class="active tw"><a href="<?=l('calculator_steps/stepeleven').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>
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
          <a href="<?=l('calculator_steps/stepten').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
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
            <div class="strt-frmone stp-4">
               <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepeleven')?>">
                  
                  <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">
              <label>Property Type    <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label>

              <select class="optnone" name="loan[loan_property_type]" required="">
              <?php if (!empty($loan['loan_property_type'])){ ?> 
               <option value="<?=$loan['loan_property_type']?>"><?=$loan['loan_property_type']?></option>

                <?php } else{?>  
                <option value="">- Select an Option</option>
                <option value="Single Family">Single Family</option>
                <option value="Condominium">Condominium</option>
                <option value="Townhouse">Townhouse</option>
                <option value="Two to Four Unit Property">Two to Four Unit Property</option>
                <option value="Cooperative">Cooperative</option>
                <option value="Manufactured Home">Manufactured Home</option>
                <?php } ?>
              </select>

               <label>Property Use <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal1"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label>
              <select class="optnone" name="loan[loan_property_use]" required="">
                      <?php if (!empty($loan['loan_property_use'])){ ?> 
               <option value="<?=$loan['loan_property_use']?>"><?=$loan['loan_property_use']?></option>

                <?php } else{?>  
                <option value="">- Select an Option</option>
                <option value="Primary Residence">Primary Residence</option>
                <option value="Second Home">Second/Vacation Home</option>
                <option value="Investment">Investment/Rental Property</option>
                <?php } ?>
              </select>

              <label>Property County/Municipality</label>
              <input type="text" name="loan[loan_property_county]" required="" value="<?=$loan['loan_property_county']?>">
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

        <h1>Property Use</h1><br>
        <p>The way you’ll use your home can impact the type of loan you might qualify for, how much you can borrow, and how much down payment you'll need.</p><br>
       
        <ul>
        <li><label>Single Family:</label><p>A free-standing structure that doesn’t share walls or doors with another building.</p></li>

       <li><label>Condominium:</label> <p>An individually-owned unit in a building or complex with multiple units.</p></li>

<li><label>Townhouse:</label> <p>A home that shares walls with other homes placed side-by-side.</p></li>
</ul><br>

<p>Still have questions? Contact your loan team.</p>



      </div>
  
    </div>
  </div>
</div>

