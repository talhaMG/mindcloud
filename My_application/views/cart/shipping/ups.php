<style type="text/css">
.upsdiv > h3 {
    background: #bba600 none repeat scroll 0 0;
    color: white;
    font-weight: bold;
    margin: 0;
    padding: 10px;
    text-transform: uppercase;
}
.upsdiv-table {
    border: 1px solid #bba600;
}
.upsdiv-table td{padding:11px !important;}
#ups_shipping-btn{
    background: #BBA600;
    border: 1px solid #BBA600;
}
</style>

<div class="cart_totals upsdiv">
    <h3> Select Shipment </h3>
    <form id='ups_shipping-form'>

        <!-- USP form start -->
        <table class="table table-striped upsdiv-table " id="upsshiptype">
            
            <!-- <input type="hidden" name="ounces" value="5"> -->
            <input type="hidden" name="pound" value="<?=$weight?>">
            <!-- <input type="hidden" name="originZip" value="59759"> -->
            <!-- <input type="hidden" name="grandTotal" id="grandTotal" value="200"> -->

            <tbody>
                <!-- <tr>
                    <td colspan="2" style="text-align: left;">
                        <label>UPS Shipment</label>
                    </td>
                </tr> -->

                <tr>
                    <td class="text-left">Select Service</td>
                    <td class="text-right">
                        <strong>
                            <select name="servictype" class="form-control" required="">
                                <option value="">--Service--</option>
                                <? 
                                if(isset($ups_service_list) AND array_filled($ups_service_list)) :
                                    foreach($ups_service_list as $id=>$value) :?>
                                        <option <?=($shipping_service == $id) ? 'selected=""' : ''?> value="<?=$id?>"><?=ucfirst($value)?></option>
                                    <? 
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </strong>
                    </td>
                </tr>
                <tr>
                    <td class="text-left">Destination (Zip code)</td>
                    <td class="text-right">
                        <strong>
                            <input required="" class="input-text form-control" type="text" name="destination" value="<?=$shipping_zip?>">
                        </strong>
                    </td>
                </tr>
                <tr>

                    <td></td>
                    <td class="text-right">
                        <strong>
                            <button class="btn btn-danger" type="submit" title="Get a Quote" id="ups_shipping-btn">
                                Get a Quote ship
                                <span class="glyphicon glyphicon-play"></span>
                            </button>
                        </strong>
                        <div id='ups_shipping-loading' style='display: none'>
                            <img src="<?=l('assets/global/images/preloader.gif')?>">
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
        <!-- USP form end -->
    </form>
</div>
