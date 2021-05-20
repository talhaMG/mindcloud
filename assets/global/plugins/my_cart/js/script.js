var Cart = function () {
    var getUrl = window.location;
    //var baseUrl = getUrl.protocol + "//" + getUrl.host + "/";
    var baseUrl = base_url;
    //var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];


    /*
    */
    var urls = {
        get_cart :  baseUrl+"cart/ajax_get_cart_basket/" , 
        add_cart :  baseUrl + "cart/ajax_add_to_cart/" , 
        remove_cart :  baseUrl + "cart/ajax_remove/" , 
        update_qty_cart :  baseUrl + "cart/ajax_update/" , 
        save_order : baseUrl + "cart/ajax_save_order/" , 
         // save_subscription : baseUrl + "cart/ajax_save_subscription/" ,   //for package subscription
         save_subscription : baseUrl + "advertisment/ajax_save_requestinfo/" ,   //for package subscription
// 

        gotocheckout : baseUrl + "cart/gotocheckout/" , 
        shipping_charges : baseUrl + "cart/calc_shipping_charges/" , 
        discount : baseUrl + "cart/ajax_discount/",
        wishlist : baseUrl + "wishlist/ajax_add_wish",
        remove_wishlist : baseUrl + "wishlist/ajax_remove_wish",
        
        // product :  $js_config.base_url + "product/" , 
        // get_item_set :  $js_config.base_url + "cart/get_available_item_set_color/" , 
        // update_cart :  $js_config.base_url + "cart/update_cart/" , 
        // update_qty :  $js_config.base_url + "cart/update_qty/" , 
        // destroy_cart :  $js_config.base_url + "cart/destroy_cart/" , 
        //get_basket :  $js_config.base_url + "cart/get_basket/" , 
    };
    /*
    var itemSetSelector = function () {
        $("[name='cart[size]']").change(function () {
            
            /*var product_id = $(".add_cart").attr("data-id");
            var url = urls.get_item_set + product_id ;
            var params = {} ;
            params.where = {} ;
            params.where.size_id = $("[name='cart[size]']").val();
            response = AjaxRequest.fire(url, params);
            $("[name='cart[color]'] option:gt(0)").remove();
            $(response).each(function (index,data) {
                var option = $("<option>").val(data.pis_id).html(data.color_name);
                $("[name='cart[color]']").append(option);
            });*/
            /*
        });
        params = {} ;
    };
    */
    return {
        
        //main function to initiate the module
        init: function () {

            // Load Cart into the body.
            this.loadCart();


        },

        loadCart : function(cart_body){
            
            if(!cart_body)
                cart_body = ".cart_body";   
            // If cart_body exists, load
            if($(cart_body).length > 0)   
            {
                var content = this.getCart();
                
                $(".cart_body").text(content.total_item);
                
                if($(".cart-total_amount").length > 0)
                    $(".cart-total_amount").text(content.total_amount);

                if($(".cart-shipping_charges").length > 0)
                    $(".cart-shipping_charges").text(content.shipping_charges);

                if($(".cart-order_discount").length > 0)
                    $(".cart-order_discount").text(content.order_discount);

                if($(".cart-order_amount").length > 0)
                    $(".cart-order_amount").text(content.order_amount);

                
                // $(".cart_body").html(content.cart_body);
                // $(".total_amount").html(content.total_amount);
                // $(".order_amount").html(content.order_amount);

                // $(".tax").html(content.tax);
                // $(".discount").html(content.discount);
                
            }      
        },

        getCart : function(cartparams){
            return AjaxRequest.fire(urls.get_cart, cartparams);            
        },

        addCart : function(cartparams){
            response = AjaxRequest.fire(urls.add_cart, cartparams);   
            //console.log(response);
            if( response.status )  
            {
                this.loadCart();
                Toastr.success(response.msg.desc ,'', 'toast-bottom-left');

                // if wishlist product move on cart than this action perform
                if($('.wishlist_remove').length > 0)
                    $('.wishlist_remove').trigger('click');
            }       
            else
                Toastr.error(response.msg.desc ,'', 'toast-bottom-left');
                //alert(response.msg.desc) ;
        },

        removeFromCart : function(rowid){
            var cartparams = 'rowid='+ rowid;
            response = AjaxRequest.fire(urls.remove_cart, cartparams);   
            
            if( response.status )  
            {
                this.loadCart();

                $('#cart_item_'+rowid).remove();

                Toastr.success(response.msg.desc ,response.msg.title, 'toast-bottom-left');
                location.reload();
                // similar behavior as clicking on a link
                //location.reload();
            }
            else
                Toastr.error('Error found' ,'Error Occurred', 'toast-bottom-left');
                //alert(response.msg) ;
        },

        updateFromCart : function(rowid,product_id,qty){
            //var cartparams = 'rowid='+ rowid;
            var cartparams = {rowid:rowid,qty:qty,product_id:product_id};
            response = AjaxRequest.fire(urls.update_qty_cart, cartparams);   
            
            if( response.status )  
            {
                this.loadCart();

                Toastr.success(response.msg.desc ,response.msg.title, 'toast-bottom-left');

                // similar behavior as clicking on a link
                location.reload();
            }
            else {
                Toastr.error(response.msg.desc ,response.msg.title, 'toast-bottom-left');
            }
        },






        wishlist : function(product_id){
            var params = 'product_id='+ product_id;
            response = AjaxRequest.fire(urls.wishlist, params);   
            
            if( response.status )  
            {
                $('#wishlist-favorite').show();
                $('#wishlist-unfavorite').hide();

                Toastr.success(response.msg.desc ,response.msg.title, 'toast-bottom-left');
            }
            else
                Toastr.error(response.msg.desc ,response.msg.title, 'toast-bottom-left');
                //alert(response.msg) ;
        },

        remove_wishlist: function(product_id){
            var params = 'product_id='+ product_id;
            response = AjaxRequest.fire(urls.remove_wishlist, params);   
            
            if( response.status )  
            {
                $("#product_"+product_id).remove();
                Toastr.success(response.msg.desc ,response.msg.title, 'toast-bottom-left');
            }
            else
                Toastr.error('Error found' ,'Error Occurred', 'toast-bottom-left');
                //alert(response.msg) ;
        },




        gotopay : function(cartparams){
            // first save order in db
            response = AjaxRequest.fire(urls.save_order, cartparams);   
            
            // console.log(response);   
            // return false;   //for debugging

            $("#gotopayment").prop('disabled', true);
            if(response.order.status)
            {
                Toastr.success(response.order.msg.desc ,response.order.msg.title, 'toast-bottom-left');
                
                window.location = response.order.url;
                // window.location = baseUrl+"cart/payment?oid="+response.order.order_id;
            }
            else {
                $("#gotopayment").prop('disabled', false);

                Toastr.error(response.order.msg.desc ,response.order.msg.title, 'toast-bottom-left');
            }
            
            /*
            if( response.status )  
            {
                this.loadCart();
            }
            else
                Toastr.error('Error found' ,'Error Occurred', 'toast-bottom-left');
                //alert(response.msg) ;
            */
            
        },

        // gotopay_subscription : function(cartparams){
        //     // first save order in db
        //     response = AjaxRequest.fire(urls.save_subscription, cartparams);   
        //     // console.log(response);   
        //     // return false;   //for debugging

        //     $("#btn_pkg_payment").prop('disabled', true);
        //     if(response.order.status)
        //     {
        //         Toastr.success(response.order.msg.desc ,response.order.msg.title, 'toast-bottom-left');
                
        //         window.location = response.order.url;            
        //     }else{
        //         $("#btn_pkg_payment").prop('disabled', false);

        //         Toastr.error(response.order.msg.desc ,response.order.msg.title, 'toast-bottom-left');
        //     }
            
        //     /*
        //     if( response.status )  
        //     {
        //         this.loadCart();
        //     }
        //     else
        //         Toastr.error('Error found' ,'Error Occurred', 'toast-bottom-left');
        //         //alert(response.msg) ;
        //     */
            
        // },

         gotopay_subscription : function(cartparams){ //ADVERTISMENT, JOBS DOLLAR
            // first save order in db
            response = AjaxRequest.fire(urls.save_subscription, cartparams);   
            
            // console.log(response);   
            // return false;   //for debugging

            $("#btn_ads_payment").prop('disabled', true);
            if(response.order.status)
            {
                Toastr.success(response.order.msg.desc ,response.order.msg.title, 'toast-bottom-left');
                
                window.location = response.order.url;  

            }else{
                $("#btn_ads_payment").prop('disabled', false);

                Toastr.error(response.order.msg.desc ,response.order.msg.title, 'toast-bottom-left');
            }
            
            /*
            if( response.status )  
            {
                this.loadCart();
            }
            else
                Toastr.error('Error found' ,'Error Occurred', 'toast-bottom-left');
                //alert(response.msg) ;
            */
            
        },

         discount:function(params){
            // first save order in db
            response = AjaxRequest.fire(urls.discount, params);  

            if(response.status) {
                this.loadCart();
                Toastr.success(response.msg.desc ,response.msg.title, 'toast-bottom-left');
                //$('.shipping_amount').html(response.shipping_charges);
            }
            else {
                Toastr.error(response.msg.desc ,response.msg.title, 'toast-bottom-left');
                //alert('asdsad');
            }
        },

        /*
        shippingCharges:function(params){
            // first save order in db
            response = AjaxRequest.fire(urls.shipping_charges, params);  

            if(response.s)
                $('.shipping_amount').html(response.shipping_charges);
            else
                alert('asdsad');
        },


       

        
        

        


        _removeFromCart: function () {
            
            that = this;
            $("body").on("click",".cart_remove",function() {
                var rowid = $(this).attr("data-rowid");
                if(rowid)
                {
                    var url = urls.remove_cart + rowid;
                    response = AjaxRequest.fire(url, {});
                    if(response.success)
                    {
                        that.loadCart();
                    }
                }
            });

        },

        _updateQty: function () {

            that = this;
            $("body").on("change",".cart_qty",function() {
                var data = {};
                data.rowid = $(this).attr("data-rowid");
                data.qty = $(this).val();
                if(data.rowid)
                {
                    var url = urls.update_qty ;
                    response = AjaxRequest.fire( url, data );

                    if(!response.success && response.msg)
                        alert(response.msg);

                    that.loadCart();
                }
            });

        },
        */

    }; // End of class return

}(); // End of Script


// SET CART FEILDS
  $(".product_check").click(function()
    {
      var price  = $(this).attr("data-price");
      var product_id  = $(this).attr("data-product-id");
      // var product  = $("input[name=product]").val();
      // console.log(product);
      // $("#product").val(product);
      $("#productprice").val(price);
      $("#productid").val(product_id);
    });

$(document).ready(function () {
    Cart.init();

    // ADD CART BTN
    $('.add_cart').click(function(){
        var data = $(this).closest('form').serialize();
        //console.log(data);
        Cart.addCart(data);

    });

    // remove item in cart
    $('.remove_this_item').click(function(){
        if(confirm("Are you delete this item in your cart list?")) {
            var rowid = $(this).attr('data-rowid');
            Cart.removeFromCart(rowid);
        }
    });

    // Update item in cart
    $('.update_this_item').click(function(){
        var rowid = $(this).attr('data-rowid');
        var product_id = $(this).attr('data-product_id');
        var qty = $("#cart_qty-"+rowid).val();
        Cart.updateFromCart(rowid,product_id,qty);
    });


    // remove item in cart
    $('#wishlist-action').click(function(){
        var product_id = $(this).attr('data-product_id');
        Cart.wishlist(product_id); 
    });


    // remove item in cart
    $('.wishlist_remove').click(function(){
        var product_id = $(this).attr('data-product_id');
        Cart.remove_wishlist(product_id); 
    });


    // gotopay action
    $(function() {
        var $form = $('#order_data');
        $form.submit(function(event) {
            var data = $(this).closest('form').serialize();
            Cart.gotopay(data);
            return false;
        });

    });

    //package subscription
    $(function() {
        var $form = $('#subscription_data');
        $form.submit(function(event) {
            var data = $(this).closest('form').serialize();
            Cart.gotopay_subscription(data);
            return false;
        });

    });


    // $('#gotopayment').click(function(){
    //     if($("#term_agreed").prop("checked")) {
    //         $(".term_agreed").attr('style','border:none');

    //         var payment_method = $(this).attr('data-payment-method');

    //         $("#term_agreed").val(1);
    //         $('#order_payment_type').val(payment_method);

    //         if($('#copy_address').is(':checked'))
    //             copy_past_address(1 , false);
    //         // else
    //         //     copy_past_address(0 , false);
            
    //         data = $(this).closest('form').serialize();
            
            
    //         Cart.gotopay(data , payment_method);
    //     }
    //     else {
    //         $(".term_agreed").attr('style','border:1px solid rgb(166,0,0)');
    //         Toastr.error('You must need to checked terms of service.' ,'Error Occurred', 'toast-bottom-left');
    //     }
    // });






    $('#coupon_btn').click(function(){
        var coupon = $('#coupon').val();

        if(coupon.length > 0)
        {
            $data = 'coupon='+coupon;
            Cart.discount($data);    
        }
        else
        {
            Toastr.error('Coupon filled is empty' ,'', 'toast-bottom-left');
        }
       // console.log(coupon);
    });


    /*
    $('.cart_remove222').click(function(){
        alert(1);
        var data = 'rowid='+$(this).attr('data-rowid');
        console.log(data);
        Cart.removeFromCart(data);
    });
    */
});

function get_shipping_charges(country_id){
    var data = 'country_id='+country_id;
    Cart.shippingCharges(data);
}





/***
    MINUS PLUGIN START
*/
$(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[id='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[id='+fieldName+']').val());
        
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && (currentVal-1) > 0) {
            // Decrement one
            $('input[id='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[id='+fieldName+']').val(1);
        }
    });
});
/***
    MINUS PLUGIN END
*/



$(document).ready(function(){
        $('#copy_address').click(function(){
            if($(this).is(':checked'))
                copy_past_address(1,true);
            else
                copy_past_address(0,true);
        });
    });


    function copy_past_address(status , show_div){

        if(status == 1){
            if(show_div)
                $("#order-shipping_address-div").slideUp('fast');

            $('.order_shipping_fname').val($('.order_billing_fname').val());
            $('.order_shipping_lname').val($('.order_billing_lname').val());
            $('.order_shipping_email').val($('.order_billing_email').val());
            $('.order_shipping_address').val($('.order_billing_address').val());
            $('.order_shipping_address2').val($('.order_billing_address2').val());
            $('.order_shipping_city').val($('.order_billing_city').val());
            $('.order_shipping_state').val($('.order_billing_state').val());
            $('.order_shipping_country').val($('.order_billing_country').val());
            $('.order_shipping_code').val($('.order_billing_code').val());
            $('.order_shipping_phone').val($('.order_billing_phone').val());

        }
        else {
            if(show_div)
                $("#order-shipping_address-div").slideDown('fast');

            $('.order_shipping_fname').val('');
            $('.order_shipping_lname').val('');
            $('.order_shipping_email').val('');
            $('.order_shipping_address').val('');
            $('.order_shipping_address2').val('');
            $('.order_shipping_city').val('');
            $('.order_shipping_state').val('');
            $('.order_shipping_country').val(0);
            $('.order_shipping_code').val('');
            $('.order_shipping_phone').val('');
        }
    }


$("body").on('click','#colorList li a',function(){
  var color_code = $(this).attr('data-color');
  var color_name = $(this).attr('title');
  
  $("#cart-color_code").val(color_code);
  $("#cart-color_name").val(color_name);
  
  $("#colorList li a").removeAttr('class');
  $(this).attr('class','add_border');
});




// -------------------------------------------------------------
    // btn number Start
// -------------------------------------------------------------

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});

$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

// -------------------------------------------------------------
    // btn number End
// -------------------------------------------------------------