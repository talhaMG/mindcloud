
<section class="main-getstrtpg">
  <div class="container">
    <div class="ctgry-bg">
    <div class="row">
      <div class="col-md-3 col-xs-12 col-sm-3">
        <div class="getstrtpg-lst">
          <ul>
              <li class="active"><a href="<?=l('calculator_steps/stepnine').'?query-id='.$queryid.'&key='.$key?>">Getting Started</a></li>
            
            <li><a href="JavaScript:void(0)">Getting to Know You</a></li>
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
          <a href="<?=l('calculator_steps/stepfive').'?query-id='.$queryid.'&key='.$key?>" class="pull-left"><i class="fa fa-angle-left" aria-hidden="true"></i>Back</a>
          <h2>Getting Started</h2>
        </div>


        <div class="row">
          <div class="col-md-offset-3 col-md-6 col-md-offset-3 col-xs-12 col-sm-12">
             <?   
        
             $loan = $this->model_loan->find_by_pk($queryid);
           //  debug($loan);
                $param=array();
                  $param['where']['user_id']=$loan['loan_user_id'];
                  $u = $this->model_user->find_one_active($param);
               //   debug($u);
           

        ?> 
            <div class="revw-txt">
              <span>Review and confirm your information.</span>
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
            
               <div class="row">
              <div class="col-md-10 col-xs-12 col-sm-10">
                <div class="transc-img">
                  <span><img src="<?=i('')?>img47.png" class="img-responsive" alt="img"></span>
                  <div class="transc-txt">
                    <h2><?=$loan['loan_co_applicantfname']?><?=$loan['loan_co_applicantlname']?></h2>
                    <a href="mailto:info@demolinks.com"><?=$loan['loan_co_applicantemail']?></a>
                    <a href="tel:<?=$loan['loan_co_applicantphone']?>"><?=$loan['loan_co_applicantphone']?></a>
                    <p><?=$loan['loan_co_applicantmarital_status']?></p>

                          <?php if (!empty($loan['loan_co_applicantmilitary_status'])){ ?>
                     
                  <p>Military Status -<?=''.$loan['loan_co_applicantmilitary_status']?> </p>
                      <?php } else{?>  
                        
                     <p>Not Currently serving, veteran, veteran, or surviving spouse</p> 
                      <?php } ?>
 
                    <p><?=$loan['loan_co_mail_add']?></p>
                    <?php if (!empty($loan['loan_mail_add'])){ ?>
                      <p><?=$loan['loan_co_mail_add']?></p>
                     <?php }?>
                  </div>
                </div>
              </div>
              <div class="col-md-2 col-xs-12 col-sm-2">
                <div class="edt-btn">
                  <a href="<?=l('calculator_steps/stepfortyfive').'?query-id='.$queryid.'&key='.$key?>">Edit</a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="cntnu-btn">
                  <a href="<?=l('calculator_steps/ajax_stepnine').'?query-id='.$queryid.'&key='.$key?>">Continue</a>
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
  
