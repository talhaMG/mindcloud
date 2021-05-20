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
            <li class="active tw"><a href="<?=l('calculator_steps/stepfourteen').'?query-id='.$queryid.'&key='.$key?>">Getting to Know You</a></li>

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
          <a href="<?=l('calculator_steps/stepthirteen').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting to Know You</h2>
        </div>
        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
           <?$loan = $this->model_loan->find_by_pk($queryid);?>   
            <div class="few-prvd stp-6">
              <span><?=$loan['loan_fname']?>, please provide the following information.</span>
            </div>
            <div class="strt-frmone stp-7">
        <form id="form-send_us" action="<?=l('calculator_steps/ajax_stepfourteen')?>" method="get">
                 <input type="hidden" name="id" value="<?=$queryid?>">
                  <input type="hidden" name="key" value="<?=$key?>">

              <label><?=$loan['loan_fname']?> Social Security Number</label>
              <input type="tel"  name="loan[loan_security_number]" required="" pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}" placeholder="123-57-8900" value="<?=$loan['loan_security_number']?>">

              <label><?=$loan['loan_fname']?> Date of Birth</label>
              <input type="date" placeholder="$" name="loan[loan_dateof_birth]" required="" value="<?=$loan['loan_dateof_birth']?>" id="age"    min="1947-01-01" max="2012-01-01">
              
              
                 <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal" class="mchafrd"><i class="fa fa-info-circle" aria-hidden="true"></i>Why are we collecting this information?</a>
                 <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal1" class="mchafrd"><i class="fa fa-info-circle" aria-hidden="true"></i>Learn how we protect your data</a>
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

        <h1>Why are we collecting this information?</h1><br>
      <p>We need your Social Security number and date of birth so that we can obtain a current copy of your credit report. This is required when applying for a loan.</p><br>

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

        <h1>How we protect your data.</h1><br>
   <p>Blend protects your account, your personal data, and your documents with industry-standard encryption. We scan our networks and services for vulnerabilities daily. Similar to running antivirus on your computer, we run anti-vulnerability software against our infrastructure. Our systems are tested by an in-house team of security experts and third-party security groups. In addition, Blend is committed to maintaining the highest security compliance standards, including ISO27001 and SOC2 Type 2.</p><br>

<p>Still have questions? Contact your loan team.</p>



      </div>
  
    </div>
  </div>
</div>

