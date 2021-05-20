
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bglkmn">
    <div class="row">
      <div class="col-md-12 col-xs-12 col-sm-12">
        
        <div class="gt-frmone">
          <a href="<?=l('calculator_steps/stepfifty').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Review and Submit Application</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
            <?$loan = $this->model_loan->find_by_pk($queryid);
                            $param=array();
                  $param['where']['user_id']=$loan['loan_user_id'];
                  $u = $this->model_user->find_one_active($param);
         
            ?>    
            <div class="revw-txt">

              <span> <?=$loan['loan_fname']?>, double-check the information you want 
to include in your application.</span>
            </div>
            

            <div class="gtng-strthf">
            <h4>Getting Started</h4>
            </div>

    
            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img45.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Type of Transaction</h2>
                    <p><?=$loan['loan_trans']?></p>
                  </div>
                </div>
              </div>
                 <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <img src="<?=i('')?>locks.jpg" class="img-responsive" alt="img">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img46.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Applying with Someone</h2>
                     <?php if (!empty($loan['loan_apply_someone'])){ ?>    
                    <p><?=$loan['loan_apply_someone']?></p>
                    <?php } else{?>  
                      <p>Yes</p>
                    <?php } ?>
                  </div>
                </div>
              </div>
                <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <img src="<?=i('')?>locks.jpg" class="img-responsive" alt="img">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
             
                <div class="transc-img">
                  <span><img src="<?=i('')?>img47.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2><?=$loan['loan_fname']?><?=$loan['loan_lname']?></h2>
                    <h2><?=$u['user_email']?></h2>
                    <a href="tel:<?=$loan['loan_phone']?>"><?=$loan['loan_phone']?></a>
                    <p><?=$loan['loan_marital_status']?></p>
                    <?php if (!empty($loan['loan_personal_status'])){ ?>
                     
                  <p>Military Status -<?=''.$loan['loan_personal_status']?> </p>
                      <?php } else{?>  
                        
                     <p>Not Currently serving, veteran, veteran, or surviving spouse</p> 
                      <?php } ?>
 
     
                    <p><?=$loan['loan_personal_loan_status']?></p>
                    <p><?=$loan['loan_address']?></p>
                     <?php if (!empty($loan['loan_mail_add'])){ ?>
                      <p><?=$loan['loan_mail_add']?></p>
                     <?php }?>

                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepfour').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>
            
            
            <div class="hfgr">
            <hr>
            </div>

            <div class="gtng-strthf">
            <h4>Getting To Know You</h4>
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

          
            <!-- <div class="gtng-strthf">
            <h4>Income</h4>
            <a href="javascript:void(0)" class="incmbtn">Add Income</a>
            </div>

            <div class="hfgrfg">
            <hr>
            </div>

            <div class="gtng-strthf acvd">
            <h4>Assets</h4>
            <a href="javascript:void(0)" class="incmbtn">Add Asset</a>
            <span class="ttl">Total</span>
            </div>

            <div class="hfgr">
            <hr>
            </div>

            <div class="gtng-strthf">
            <h4>Real Estate</h4>
            <a href="javascript:void(0)" class="incmbtn">Add Property</a>
            </div> -->

            <div class="hfgrfg">
            <hr>
            </div>

            <div class="gtng-strthf">
            <h4>Declarations</h4>
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

            <div class="hfgr">
            <hr>
            </div>

            <div class="gtng-strthf">
            <h4>Demographic Information</h4>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img65.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Sex</h2>
                    <p><?=$loan['loan_sex']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/steptwentyeight').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img66.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Ethnicity</h2>
                    <p><?=$loan['loan_ethnicity']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/steptwentynine').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img67.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Race</h2>
                    <p><?=$loan['loan_american']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepthirty').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="hfgr">
            <hr>
            </div>

            <div class="gtng-strthf">
            <h4>Additional Questions</h4>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img69.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Current Address</h2>
                    <p><?=$loan['loan_address']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepthirtythree').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

     <!--        <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img70.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Address History</h2>
                    <p>Mid-Market, 1390 Market Street, Suite 200, 
San Francisco, 94102, USA</p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="javascript:void(0)">Edit</a>
                </div>
              </div>
            </div> -->

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img71.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Property Ownership</h2>
                    <p><?=$loan['loan_own_property']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepthirtyfour').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

       <!--      <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img72.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Employment History</h2>
                    <p>None</p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('step-thirtyfive')?>">Edit</a>
                </div>
              </div>
            </div>
 -->
            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img73.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Level of Education</h2>
                    <p><?=$loan['loan_education']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepthirtysix').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img74.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2>Dependents</h2>
                    <p><?=$loan['loan_dependents']?></p>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepthirtyseven').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="cntnu-btn">
                  <a href="<?=l('calculator_steps/stepforty').'?query-id='.$queryid.'&key='.$key?>">Continue</a>
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
  


    