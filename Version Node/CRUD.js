module.exports.insertarRegistro = function(db, callback){
  let coleccion = db.collection("users")
  coleccion.insertMany([
    {Id:1,Usuario:"p_rodriguez@hotmail.com",Contrasena:"abc123"}
  ], (error,result) => {
    console.log("Resultado de insert: " + result.toString())
  })
}
