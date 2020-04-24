$(function(){
  var l = new Login();
})

class Login {
  constructor() {
    this.submitEvent()
  }

  submitEvent(){
    $('form').submit((event)=>{
      event.preventDefault()
      this.sendForm()
    })
  }

  sendForm(){
    let form_data = new FormData();
    form_data.append('username', $('#user').val())
    form_data.append('password', $('#password').val())
    //var user = $('form').find('#user').val();
    //var password = $('form').find('#password').val();
    //document.cookie ='username='+user+'; expires=Thu, 2 Aug 2021 20:47:11 UTC; path=/';
    $.ajax({
      url: '../server/check_login.php',
      dataType: "json",
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      //data: {user:user, password:password},
      type: 'POST',
      success: function(php_response){
        if (php_response.msg == "OK") {
          //$username =  $_COOKIE["varUsuario"];
          window.location.href = 'main.html';
        }else {
          alert(php_response.msg);
        }
      },
      error: function(){
        alert("error en la comunicación con el servidor en login");
      }
    })
  }
}
