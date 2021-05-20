<div class="col-md-4">
    <section class="panel panel-default">
        <header class="panel-heading">
            <span class="large text-uppercase">
                Invoice Info
            </span>
        </header>
    
        <!-- profile information sidebar -->
        <div class="panel overflow-hidden no-b profile" style='padding:15px 0 87px 20px'>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <ul class="user-meta">
                                <?php
                                if(!empty($order_data['0']['order_id']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-credit-card mr5"></i> Invoice Number :
                                        <span><?=order_no($order_data['0']['order_id'])?></span>
                                    </li>
                                <?php
                                }
                                if(!empty($order_data['0']['invoice_date']))
                                {
                                ?>
                                    <li>
                                        <i class="fa fa-clock-o mr5"></i> Invoice Date : 
                                        <span><?=$order_data['0']['invoice_date']?></span>
                                    </li>
                                <?php
                                }
                                ?>
                                
                                <li>
                                    <i class="fa fa-money mr5"></i>
                                    Invoice Amount : <span><?=price($total_amount + $shipping_charges , 'admin')?></span>
                                </li>

                                <li>
                                    <?php
                                        //debug($order_data);
                                    ?>
                                    <i class="fa fa-area-chart mr5"></i>
                                    Invoice Status : <span><?=$this->modeladmin->order_status($order_data[0]['order_status'])?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
