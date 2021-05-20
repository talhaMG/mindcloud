<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
<div class="row">
<div class="col-sm-12 col-md-12">
<div class="panel panel-info">
<div class="panel-heading">
    Review Order
    
    <div class="pull-right">
        <? if(isset($is_edit) AND ($is_edit == true)) :?>
        <small><a href="<?=l('cart')?>" class="afix-1">Edit Cart</a></small>
        <? endif;?>
    </div>
</div>

<? if(isset($data) && array_filled($data)) :?>
<table class="table shopping table-hover">
    <thead>
        <tr>
            <th>Product</th>
            <!-- <th>Quantity</th>
            <th class="text-center">Price</th> -->
            <th class="text-center">Total</th>
            <!-- <th>&nbsp;</th> -->
        </tr>
    </thead>
    <tbody>

        <?php 
        //debug($data,1);
        foreach($data as $value) { ?>
        <tr id="cart_item_<?=$value["rowid"]?>">
            <td class="col-sm-8 col-md-11">
                <div class="media">
                    <a class="thumbnail pull-left set-td" href="javascript:void(0);"> 
                        <img class="media-object" src="<?=$value['options']['product_img']?>" style='width:75px;height:75px;'>
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="javascript:void(0);"><?=ucfirst($value['name'])?></a>
                        </h4>

                        <strong class="media-heading m-left-15">
                            QTY <?=$value['qty']?> @ <?=price($value['price'])?>
                        </strong>
                        <br />

                        <!-- <strong class="media-heading m-left-15">
                            Color: <span style='padding: 1px 6px;width: 7px;background: <?=$value['options']['cart_additional']['color_code']?>'></span>
                        </strong><br />
                        <strong class="media-heading m-left-15">
                            Qty <?=$value['qty']?> @ <?=price($value['price'])?>
                        </strong> -->

                        <!-- <h5 class="media-heading m-left-15">by<a href="javascript:void(0);">Brand name</a></h5> -->
                        <!-- <span class="span-left">Status: </span><span class="text-success"><strong>In Stock</strong></span> -->
                    </div>
                </div>
            </td>
            <!-- <td class="col-sm-1 col-md-1" style="text-align: center">
                <?=$value['qty']?>
            </td>
            <td class="col-sm-1 col-md-1 text-center"><strong><?=price($value['price'])?></strong></td> -->
            <td class="col-sm-1 col-md-1 text-center"><strong><?=price($value['subtotal'])?></strong></td>

            
        </tr>
        <?php  } ?>
        
        <tr>
            <!-- <td>&nbsp;  </td>
            <td>&nbsp;  </td> -->
            <td><h5>Subtotal</h5></td>
            <td class="text-right"><h5><strong  id='cart-total_amount'><?=price($total_amount)?></strong></h5></td>
        </tr>

        <tr>
            <!-- <td>&nbsp;  </td>
            <td>&nbsp;  </td> -->
            <td><h5>Less Discount</h5></td>
            <td class="text-right"><h5><strong id='cart-order_discount'><?=price($discount_amount)?></strong></h5></td>
        </tr>

        <tr>
            <!-- <td>&nbsp;  </td>
            <td>&nbsp;  </td> -->
            <td><h5>Add: Estimated shipping</h5></td>
            <td class="text-right"><h5><strong id='cart-shipping_charges'><?=price($shipping_amount)?></strong></h5></td>
        </tr>
        <tr>
            <!-- <td>&nbsp;  </td>
            <td>&nbsp;  </td> -->
            <td><h3>Total</h3></td>
            <td class="text-right"><h3><strong id='cart-order_amount'><?=price($total_order_amount)?></strong></h3></td>
        </tr>
    </tbody>
</table>
<?php
endif;
?>

</div>
</div>
</div>

<!--REVIEW ORDER END-->
</div>