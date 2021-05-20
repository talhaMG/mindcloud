<style>

.cms_page h1
{

font-size:30px;
margin:40px 0;



}

.cms_page h2
{

font-size:18px;
margin:40px 0;



}



</style>

<? /*
$this->load->view('_widget-inner_banner',array('is_title'=>$title)); */?>


    <section class="cms_page">

        <div class="middle">

            <div class="container">

            
                <div class="row">

                    <div class="col-md-12">

                        <div class="row"> 



                          <div class="col-md-12">



                            <!-- <h2> <?=$title?> </h2> -->


                             <div style="width: 100%; padding: 100px 0px;">
                                <h1 style="font-weight: bold; text-align: center;color:rgb(255,27,0)">THANK YOU <span style="color: #323232">FOR YOUR ORDER</span></h1>
                                <h2 style="font-family: &quot;Droid Serif&quot;,Georgia,serif; font-style: italic; text-transform: none; letter-spacing: 0px; text-align: center;">
                                    <br> 
                                    We have successfully process your order and we will contact you shortly to confirm your order.

                                    Meanwhile, if you have any questions or concerns, please feel free to give us a call (<?=g('db.admin.email_contact_us')?>).
                                    
                                </h2>
                            </div>



                          </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>