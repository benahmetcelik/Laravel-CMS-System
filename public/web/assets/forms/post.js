"use strict";
$('#subscribeFormMessage').hide();
$('#contactFormMessage').hide();

$(document.body).on('click','#subscribe',function () {
    let email =  $('#subscribe_email').val();
    let token = $("input[name=_token]").val();
    let url = $("input[name=post]").val();
    $.ajax({
        url:url,
        type: 'POST',
        data : {
            'email' : email,
            '_token' : token
        },
        success:function (response){
            if (response == true){
                $('#subscribeFormMessage').show();
                $('#subscribeFormMessage').append('Teşekkürler !');
            }else{
                $('#subscribeFormMessage').show();
                $('#subscribeFormMessage').append('Hata !');
            }
        }

    })
})


$(document.body).on('click','#contact',function () {
    let email =  $('#contact_email').val();
    let token = $("input[name=_token]").val();
    let phone =  $('#contact_phone').val();
    let name =  $('#contact_name').val();
    let message =  $('#contact_message').val();
    let url = $("input[name=contactPost]").val();

    $.ajax({
        url:url,
        type: 'POST',
        data : {
            'mail' : email,
            'phone' : phone,
            'content' : message,
            '_token' : token,
            'name':name
        },
        success:function (response){
            if (response == true){
                $('#contactFormMessage').show();
                $('#contact').hide();
                $('#contactFormMessage').append('Teşekkürler !');
            }else{
                $('#contactFormMessage').show();
                $('#contactFormMessage').append('Hata !');
            }
        }

    })
})
