<table id="order" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Payment Status</th>
                <th>Order Amount</th>
                <th>Course Count</th>
                <th>Tax</th>
                <th>Discount</th>
                <th>Total Amount</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
        
            foreach($data as $value) {
            ?>
                <tr>
                    <td><?=order_no($value['order_id'])?></td>
                    <td><?=$value['order_date']?></td>
                    <td>
                        <?=$payment_list[$value['order_payment_status']]?>
                        <? /* if($value['order_payment_status'] == 0) : ?>
                        <a class='label label-default' target='_blank' href="<?=l('cart/payment?oid='.$value['order_id'])?>">Make Order</a>
                        <? endif;
                        */
                        ?>
                        <? /*
                        <br />
                        <?=$delivery_status[$value['order_delivery_status']]?>
                        */
                        ?>
                    </td>
                    <td><?=price($value['price'])?></td>
                    <td><?=count($value['items'])?></td>
                    <td><?=price($value['order_tax_amount'])?></td>
                    <td><?=price($value['order_discount_amount'])?></td>
                    <td><?=price(($value['price']+$value['order_shipping_amount']+$value['order_tax_amount'])-$value['order_discount_amount'])?></td>

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
                                <td><strong>Amount</strong></td>
                                <td></td>
                            </tr>
                            <?php
                            if(isset($value['items']) AND array_filled($value['items'])) {
                                $i=1;
                                
                                foreach($value['items'] as $item) {
                                    $unserialize = unserialize($item['item_serialize']);
                                    
                                    $location = g('db.admin.company_address');//$this->model_course->get_location($item['course_location_id']);
                                    
                                    $type = $item['item_type'];
                                    
                                    if($type == 2)
                                    {
                                        $bundle = $this->model_bundle_courses->find_by_pk($item['item_bundle_data']);
                                        
                                        $params1 = array();
                                        $params1['joins'][] = array(
                                            "table"=>"course" ,
                                            "joint"=>"course.course_id = bundle_courses_data.bcd_course_id",
                                        );
                                        $params1['where']['bcd_bundle_id'] = $bundle['bc_id'];
                                        $course_datassss = $this->model_bundle_courses_data->find_one($params1);
                                        
                                        $timing = $bundle['bc_timing'];//$item['course_timing']. "(".$item['course_time_duration'].")";
                                    	$course_date = date("l,F d Y" , strtotime($bundle['bc_started_date']));
                                        $course_duration = "";
                                        if(isset($course_datassss['course_address']))
                                            $location = $course_datassss['course_address'];
                                        else
                                            $location = g('db.admin.company_address');
                                    }
                                    else
                                    {
                                        $timing = $item['course_timing']. "(".$item['course_time_duration'].")";
                                        $course_date = date("l,F d Y" , strtotime($item['course_started_date']));
                                        $course_duration = $item['course_startedend_date'];
                                        $location = $item['course_address'];
                                    }
                                    
                                    $size = isset($unserialize['options']['cart_additional']['size']) ? $unserialize['options']['cart_additional']['size'] : '-';
                                    $color = isset($unserialize['options']['cart_additional']['color_name']) ? $unserialize['options']['cart_additional']['color_name'] : '-';
                                    //$img = $item['item_product_img'];
                                    $img = get_image($item['course_image'],$item['course_image_path']);
                                ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><img src='<?=$img?>' style='width:50px;height:50px' /></td>
                                        <td>
                                            <?=$item['item_product_name']?><br />
                                            <? if($type != 1):?>
                                                Location: <?=$location?><br />
                                                Timing: <?=$timing?> <br />
                                                Date : <?=$course_date;?> <br />
    											<?php
    											if(!empty($course_duration)) {
    											    echo "Duration : " . $course_duration;
    											}
    										endif;
											?>
                                            
                                            <!-- Color:<?=$color?><br />
                                            Size:<?=$size?><br /> -->
                                        </td>
                                        <td><?=$item['item_qty']?></td>
                                        <td><?=$item['item_rate']?></td>
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