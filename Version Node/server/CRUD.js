var User = require('./modelUsuarios.js')

module.exports.insertarUsuario = function(callback){
  let Usuario = new User({Id: 1, Usuario: "p_rodriguez@hotmail.com", Contrasena: "abc123"})
  Usuario.save((error) => {
    if (error) callback(error)
    callback(null, "Registro guardado")
  })
}
