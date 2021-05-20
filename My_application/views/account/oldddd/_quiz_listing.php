<table id="order" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S#</th>
                <th>Quiz Name</th>
                <th>Image</th>
                <th>Amount</th>
                <th>No. of Questions</th>
                <th>Time Limit</th>
                <th>View Quiz</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            foreach($data as $value) {
                $count = explode(",", $value['oq_quiz_ids']);
                $is_expired_status = $this->model_online_quiz_expiry->is_expired_status($value['item_product_id']);


            ?>
                <tr>
                    <td><?=$i?></td>
                    <td>
                        <?=$value['item_product_name']?> <br />
                        <?=order_no($value['item_order_id'])?>
                        <?=$payment_list[1]?>
                    </td>
                    <td><img src="<?=$value['item_product_img']?>" style='width: 50px;' /></td>
                    <td><?=price($value['item_price'])?></td>
                    <td><?=count($count)?></td>
                    <td><?=$value['oq_time_limit']?> Minutes</td>
                    <td>
                        <?php if($is_expired_status) :?>
                            <a href="javascript:void(0);" class="btn btn-danger">Quize Expired <i class="fa fa-remove" aria-hidden="true"></i></a>
                            <div class="clearfix"></div>
                            <select class='payment_type-<?=$value['oq_id']?>' style="padding: 7px 0px; margin-top: 3px;">
                                <option value="">Select Extension Period</option>
                                <option value="1">$25 for 30 Days</option>
                                <option value="2">$30 for 60 Days</option>
                            </select>
                            <a data-id='<?=$value['oq_id']?>' href="javascript:void(0);" class="btn btn-primary pay_online_quizes">Pay Now <i class="fa fa-usd" aria-hidden="true"></i></a>
                        <?php else:?>
                            <a data-id='<?=$value['oq_id']?>' href="javascript:void(0);" class="btn btn-primary view_online_quizes">View Quizes <i class="fa fa-list" aria-hidden="true"></i></a>
                        <?php endif;?>
                    </td>
                </tr>
            <?php
            $i++;
            }
            ?>
        </tbody>
    </table>