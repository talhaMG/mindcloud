<style type="text/css">
.shopping .media .thumbnail {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
    display: block;
    height: 60px;
    line-height: 1.42857;
    margin-bottom: 2px;
    padding: 4px;
    transition: border 0.2s ease-in-out 0s;
    width: 50px;
}

.shopping .media-heading {
    color: #12151a;
    font-size: 14px;
    letter-spacing: 1px;
    margin: 10px 2px 0 8px;
    text-transform: none;
}
h4.media-heading a {
    font-size: 14px;
    margin-bottom: 10px;
}
.checkout-button {
    background-color: #323232;
    border: 2px solid transparent;
    color: #fff;
    display: inline-block;
    font-size: 15px;
    font-weight: 600;
    padding: 8px 25px !important;
    transition: all 0.4s ease-in-out 0s;
}

.cards{
    margin: 0;
    padding: 0;
}
.cards .hand {
    float: left;
    list-style: outside none none;
    margin-right: 5px;
    margin-top: 5px;
}

.panel-info > .panel-heading {
    background-color: #87C500 !important;
    border-color: #87C500 !important;
    color: white !important;
    padding:15px;
}
.panel-info {
    border-color: #87C500 !important;
}
.checkout-main {
    padding: 5% 0;
}

.panel-heading a {
    color: #fff;
    padding: 15px;
}

</style>


<!-- 
  <?$this->load->view("widgets/inner_banner")?> -->


<!-- Shopping Cart Section Starts Here -->
    <div class="container">
    <div class="checkout-main">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                
                <? $this->load->view('cart/_payment-review',array('is_edit'=>false));?>
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">

                 <!-- accordin -->
                 <div class="panel-group" id="accordion">
                    
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> Payment </a>
                  </h4>
              </div>
              <div id="collapse2" class="panel-collapse in">
                <div class="panel-body">
                <br>    
                <? $this->load->view('widgets/_amazon-step1');?>

                </div>
            </div>
        </div>

    </div> 
</div>
            <!-- accordin -->
                </div>

            </div>
            <div class="row cart-footer">
        
            </div>



    </div>
    </div>




