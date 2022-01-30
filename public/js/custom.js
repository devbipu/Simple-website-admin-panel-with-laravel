//Contact page data


$('#messageSend').click(function(){
    var name = $('#name').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var message = $('#message').val();
    contactMessage(name,email,phone,message)
})


function contactMessage(name,email,phone,message){

    var data = {
        name    : name,
        email   : email,
        phone   : phone,
        message : message
    }

    axios.post('/contact_message', data)
    .then(function(response){
        console.log(response.status);
    })
    .catch(function(error) {
        console.log(error);
    })
}