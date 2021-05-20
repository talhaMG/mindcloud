


    <table id="order" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Payment Status</th>
                <th>Payment Method</th>
                <th>Order Amount</th>
                <th>Total Items</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // debug($data);

            foreach($data as $value) {
            ?>
                <tr>
                    <td><?=order_no($value['order_id'])?></td>
                    <td><?=$value['order_date']?></td>
                    <td>
                        <?=$this->model_shop_order->get_payment_status($value['order_payment_status']);?>
                    </td>
                    <td><?=$value['order_payment_type']?></td>
                    <td><?=price($value['price'])?></td>
                    <td><?=count($value['items'])?></td>
                    <td>
                        <p>
                            <strong>Paypal Invoice ID:</strong> <?=$value['order_paypal_ipn_track_id']?><br />
                            <? if(!empty($value['order_note'])):?>
                            <strong>Note:</strong><span style="color:green"><?=$value['order_note']?></span>
                            <? endif;?>
                        </p>
                        <table class="table table-bordered"> 
                            <tr>
                                <td><strong>S#</strong></td>
                                <td><strong>Image</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>Qty</strong></td>
                                <td><strong>Price</strong></td>
                                <!-- <td><strong>Amount</strong></td> -->
                                <td></td>
                            </tr>
                            <?php
                            if(isset($value['items']) AND array_filled($value['items'])) {
                                $i=1;
                                
                                foreach($value['items'] as $item) {
                                    $unserialize = unserialize($item['item_serialize']);
                                    
                                    $location = g('db.admin.company_address');//$this->model_course->
                                    
                                    $type = $item['item_type'];
                             
                                    $img = $item['item_product_img'];
                                    
                                ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><img src='<?=$img?>' style='width:50px;height:50px' /></td>
                                        <td>
                                            <?=$item['item_product_name']?><br />
                                            <? if($type != 1):?>
                                                Location: <?=$location?><br />
                                                
                                                Date : <?=$course_date;?> <br />
                                                <?php
                                            endif;
                                            ?>
                                            
                                            <!-- Color:<?=$color?><br />
                                            Size:<?=$size?><br /> -->
                                        </td>
                                        <td><?=$item['item_qty']?></td>
                                        
                                        <td><?=price($item['item_price'])?></td>
                                        <td>
                                            <? if($item['item_type'] == 2) :?>
                                            <a href='javascript:void(0);' class="btn-primary1 view_bundle_courses" data-id='<?=$item['item_bundle_data']?>'>View Courses</a>
                                            <? 
                                            else:
                                                echo "-";
                                            endif;?>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                                }
                            }
                            ?>
                        </table>
                </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>