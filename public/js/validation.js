$(document).ready(function(){
    $('.razorpay_btn').click(function(e){
        e.preventDefault();

        var fname = $('.fname').val();
        var lname = $('.lname').val();
        var email = $('.email').val();
        var phone = $('.phone').val();
        var address01 = $('.address01').val();
        var address02 = $('.address02').val();
        var country = $('.country').val();
        var state = $('.state').val();
        var city = $('.city').val();
        var pincode = $('.pincode').val();
        var comment = $('.comment').val();

        if(!fname)
        {
            fname_error = "First Name requried";
            $('#fname_error').html('');
            $('#fname_error').html(fname_error);
        }
        else
        {
            fname_error = "";
            $('#fname_error').html('');
        }

        if(!lname)
        {
            lname_error = "Last Name requried";
            $('#lname_error').html('');
            $('#lname_error').html(lname_error);
        }
        else
        {
            lname_error = "";
            $('#lname_error').html('');
        }

        if(!email)
        {
            email_error = "Email requried";
            $('#email_error').html('');
            $('#email_error').html(email_error);
        }
        else
        {
            email_error = "";
            $('#email_error').html('');
        }

        if(!phone)
        {
            phone_error = "Phone No requried";
            $('#phone_error').html('');
            $('#phone_error').html(phone_error);
        }
        else
        {
            phone_error = "";
            $('#phone_error').html('');
        }

        if(!address01)
        {
            address01_error = "Address requried";
            $('#address01_error').html('');
            $('#address01_error').html(address01_error);
        }
        else
        {
            address01_error = "";
            $('#address01_error').html('');
        }
        if(!address02)
        {
            address02_error = "Address optional requried";
            $('#address02_error').html('');
            $('#address02_error').html(address02_error);
        }
        else
        {
            address02_error = "";
            $('#address02_error').html('');
        }

        if(!country)
        {
            country_error = "Country requried";
            $('#country_error').html('');
            $('#country_error').html(country_error);
        }
        else
        {
            country_error = "";
            $('#country_error').html('');
        }

        if(!state)
        {
            state_error = "state requried";
            $('#state_error').html('');
            $('#state_error').html(state_error);
        }
        else
        {
            state_error = "";
            $('#state_error').html('');
        }


        if(!city)
        {
            city_error = "city requried";
            $('#city_error').html('');
            $('#city_error').html(city_error);
        }
        else
        {
            city_error = "";
            $('#city_error').html('');
        }

        if(!pincode)
        {
            pincode_error = "pincode requried";
            $('#pincode_error').html('');
            $('#pincode_error').html(pincode_error);
        }
        else
        {
            pincode_error = "";
            $('#pincode_error').html('');
        }
        if(fname_error != '' || lname_error != '' || email_error != '' || phone_error != '' || address01_error != '' || address02_error != '' || country_error != '' || state_error != '' || city_error != '' || pincode_error != '')
        {
            return false;
        }
        else{

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            var data = {
                 'fname':fname,
                 'lname':lname,
                 'email':email,
                 'phone':phone,
                 'address01':address01,
                 'address02':address02,
                 'country':country,
                 'state':state,
                 'city':city,
                 'pincode':pincode,
                 'comment':comment,
            }



            $.ajax({
                method: "POST",
                url: "/processtopay",
                data: data,
                success: function(response){
                    // window.location.reload();
                    // swal("",response.status,"success");
                    // alert(response.total_price)
                    var options = {
                        "key": "rzp_test_6hOawYVwqYyeB7", // Enter the Key ID generated from the Dashboard
                        "amount": response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        "currency": "INR",
                        "name": response.fname+''+response.lname,
                        "description": "Thank you for your choosing",
                        "image": "https://example.com/your_logo",
                        // "order_id": "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        "handler": function (responsea){
                            swal(responsea.razorpay_payment_id);
                            $.ajax({
                                method:"POST",
                                url: "/checkout/order",
                                data: {
                                    'fname':response.fname,
                                    'lname':response.lname,
                                    'email':response.email,
                                    'phone':response.phone,
                                    'address01':response.address01,
                                    'address02':response.address02,
                                    'country':response.country,
                                    'state':response.state,
                                    'city':response.city,
                                    'pincode':response.pincode,
                                    'comment':response.comment,
                                    'payment_mode':"Pay with Razarpay",
                                    'payment_id':responsea.razorpay_payment_id,
                                },
                                success: function (response){
                                    // alert(responseb.status);
                                    swal(response.status);
                                    window.location.href = "/";
                                }
                            });
                        },
                        "prefill": {
                            "name": response.fname+''+response.lname,
                            "email": response.email,
                            "contact": response.phone,
                        },
                        "notes": {
                            "address": "Razorpay Corporate Office"
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }

            });
        }








        // alert('hellow');
    });
});
