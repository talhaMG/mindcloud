<div class="col-md-4">
    <section class="panel panel-default">
        <header class="panel-heading">
            <span class="large text-uppercase">
                Billing INFO
            </span>
        </header>
    
        <!-- profile information sidebar -->
        <div class="panel overflow-hidden no-b profile" style='padding:15px 0px 0px 15px'>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h4 class="mb0">
                                <?=$order_data['0']['billing_name']?>
                            </h4>
                            <ul class="user-meta">
                                <?php
                                if(!empty($order_data['0']['billing_address1']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-home mr5"></i> Address # :
                                        <span><?=$order_data['0']['billing_address1']?></span>
                                    </li>
                                <?php
                                }
                                if(!empty($order_data['0']['billing_address2']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-home mr5"></i> Address (Line 2) # :
                                        <span><?=$order_data['0']['billing_address2']?></span>
                                    </li>
                                <?php
                                }
                                if(!empty($order_data['0']['billing_city']) || !empty($order_data['0']['billing_country']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-flag-o mr5"></i> 
                                        City : <span><?=$order_data['0']['billing_city']?></span>
                                        Country : <span><?=$order_data['0']['billing_country_name']?></span>
                                    </li>
                                <?php
                                }
                                if(!empty($order_data['0']['billing_postal_code']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-building-o mr5"></i>
                                        POST/ZIP Code : <span><?=$order_data['0']['billing_postal_code']?></span>
                                    </li>
                                <?php
                                }
                                if(!empty($order_data['0']['billing_email']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-envelope-o mr5"></i> Email : 
                                        <span><?=$order_data['0']['billing_email']?></span>
                                    </li>
                                <?php
                                }
                                if(!empty($order_data['0']['billing_phone']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-phone mr5"></i>
                                        Phone : <span><?=$order_data['0']['billing_phone']?></span>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
