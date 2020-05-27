var User = require('./model/user.js')

module.exports.insertarUsuario = function(callback){
  var user = new User({
    Id: "1",
    Usuario: "p_rodriguez@hotmail.com",
    Contrasena: "abc123"
  })
  user.save((error) => {
    if (error) callback(error)
    callback(null, "Registro guardado")
  })
}
