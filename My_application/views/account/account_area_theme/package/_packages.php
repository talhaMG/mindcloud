<table id="order" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Order Amount</th>
                
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($data) && array_filled($data)): ?>
            
        
            <?php
            
            foreach($data as $value) {
            ?>
                <tr>
                    <td><?=order_no($value['subscription_id'])?></td>
                    <td><?=$value['subscription_date']?></td>
                    <td>
                        <?=$this->model_subscription->get_payment_status($value['subscription_payment_status']);?>
                        <?php if ($value['subscription_payment_status'] != 1): ?>
                            <!-- <span><a href="">Pay Now</a></span> -->
                        <?php endif ?>
                    </td>
                    <td><?=$value['subscription_payment_type']?></td>
                    <td><?=price($value['subscription_amount'])?>
                        <?php if ($value['subscription_status'] == 1): ?>
                            <span style="color: #4CAF50;    padding-left: 15px;"><i class="fa fa-check-circle-o" aria-hidden="true" style="font-size: 22px"></i><b>ACTIVE</b></span>
                        <?php endif ?>
                    </td>
                    
                    <td>
                        <p>
                            <!-- <strong>Paypal Invoice ID:</strong> <?=$value['subscription_paypal_ipn_track_id']?><br /> -->
                            <? if(!empty($value['subscription_note'])):?>
                            <strong>Note:</strong><span style="color:green"><?=$value['subscription_note']?></span>
                            <? endif;?>
                        </p>
                        <table class="table table-bordered"> 
                            <tr>
                                <td><strong>Package Title</strong></td>
                                <td><strong>Price</strong></td>
                                <td><strong>Get Expire</strong></td>
                                
                                <td></td>
                            </tr>
                                    <tr>
                                        <td>
                                            <?=$value['subscription_package_name']?><br />
                                        </td>
                                        
                                        <td><?=price($value['subscription_amount'])?></td>
                                        <td><?=csl_date($value['subscription_package_expire'], 'F d, Y')?></td>
                                        
                                    </tr>
                               
                          
                        </table>
                </td>
                </tr>
            <?php
            }
            ?>
            <?php endif ?>
        </tbody>
    </table>