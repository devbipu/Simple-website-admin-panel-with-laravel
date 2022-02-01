

/** form clear method **/  
function clearContactForms(form){
    $(form + ' input').val('');
}  


    let sendContBtnAnim = "<div class='spinner-border' role='status'><span class='sr-only'>Loading...<pan></div>";
//Contact page data
$('#messageSend').click(function(){
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();
    $(this).html(sendContBtnAnim);
    contactMessage(name,email,phone,message)
})


function contactMessage(name,email,phone,message){

    var data = {
        name    : name,
        email   : email,
        phone   : phone,
        message : message
    }

    if(name.length == 0 && email.length == 0 && phone.length == 0 && message.length == 0 ){
        $('#messageSend').html("Fill up the form"); 
        $('#messageSend').addClass('bg-danger');
        var contactForm = $('#contactForm input');
        contactForm.css('border-color', 'red');
        setTimeout(function(){
            $('#messageSend').html("Send Message"); 
            $('#messageSend').removeClass('bg-danger');
            contactForm.css('border-color', 'inherit');
        }, 4000)
    }else{
        axios.post('/contact_message', data)
        .then(function(response){
            $('#messageSend').html("Send Success"); 
            $('#messageSend').addClass('bg-success');
            setTimeout(function(){
                $('#messageSend').removeClass('bg-success');
                $('#messageSend').html("Send Message");
            },5000)
            clearContactForms('#contactForm');
        })
        .catch(function(error) {
            $('#messageSend').addClass('bg-danger');
            $('#messageSend').html("Send Faild");
            setTimeout(function(){
                $('#messageSend').removeClass('bg-danger');
                $('#messageSend').html("Send Message");
            },5000)
            console.log(error);
        })
    }
    
}
