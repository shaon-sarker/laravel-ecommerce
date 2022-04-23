$(document).ready(function(){

    //ADD TO CART START
    $('.addtoCartbtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product-data').find('.product_id').val();
        var product_quantity = $(this).closest('.product-data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_quantity': product_quantity,
            },
            success: function(response){
                swal(response.status);
            }

        });


    });

    //ADD TO CART END

    //ADD WISHLIST ITEM
    $('.addtoWishlistbtn').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product-data').find('.product_id').val();
        // var product_quantity = $(this).closest('.product-data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
                // 'product_quantity': product_quantity,
            },
            success: function(response){
                swal(response.status);
            }

        });


    });

    //ADD WISHLIST ITEM

     //DELETE WISHLIST ITEM START
     $('.delete-wishlist-item').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product-data').find('.product_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success: function(response){
                window.location.reload();
                swal("",response.status,"success");
            }

        });
    });
    //DELETE WISHLIST ITEM START




    //INCREMENT & DECREMENT CART AMOUNT START
    $('.increment-btn').click(function(e){
        e.preventDefault();

        // var inc_value = $('.qty-input').val();
        var inc_value = $(this).closest('.product-data').find('.qty-input').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            // $('.qty-input').val(value);
            $(this).closest('.product-data').find('.qty-input').val(value);
        }

    });


    $('.decrement-btn').click(function(e){
        e.preventDefault();

        // var dec_value = $('.qty-input').val();
        var dec_value = $(this).closest('.product-data').find('.qty-input').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            // $('.qty-input').val(value);
            $(this).closest('.product-data').find('.qty-input').val(value);
        }

    });
 //INCREMENT & DECREMENT CART AMOUNT START


    //DELETE CART ITEM START
    $('.delete-cart-item').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product-data').find('.product_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-to-cart",
            data: {
                'product_id': product_id,
            },
            success: function(response){
                window.location.reload();
                swal("",response.status,"success");
            }

        });
    });
    //DELETE CART ITEM START

    //CHANGE QUANTIY WHEN STAY IN CART PAGE
    $('.changeQuantity').click(function(e){
        e.preventDefault();

        var product_id = $(this).closest('.product-data').find('.product_id').val();
        var product_quantity = $(this).closest('.product-data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        data = {
            'product_id': product_id,
            'product_quantity': product_quantity,
        }

        $.ajax({
            method: "POST",
            url: "/updatecart",
            data: data,
            success: function(response){
                window.location.reload();
                // swal("",response.status,"success");
                // alert(response)
            }

        });
    });
//CHANGE QUANTIY WHEN STAY IN CART PAGE

});
