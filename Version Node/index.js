var MongoClient = require('mongodb').MongoClient
var url = "mongodb://localhost/Agenda"
var Operaciones = require('./CRUD.js')
MongoClient.connect(url,function(err.db){
  if (err) console.log(err){
  console.log ("Conexion establecida")
  Operaciones.insertarRegistro(db, (error,result)=>{
      if(error)console.log("Error insert registros: " + console.error)
    })
})
