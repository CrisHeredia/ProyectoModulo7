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
    $.ajax({
      url: '../server/check_login.php',
      dataType: "text",
      cache: false,
      processData: false,
      contentType: false,
      data: form_data,
      type: 'POST',
      success: function(php_response){
        if (php_response == "OK") {
          alert(php_response);
          //window.location.href = 'main.html';
        }else {
          alert(php_response);
        }
      },
      error: function(){
        alert("error en la comunicación con el servidor");
      }
    })
  }
}


/*$(function(){
  $("#login-form").submit(submitLogin);
})*/
