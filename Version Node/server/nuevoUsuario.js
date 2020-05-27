var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost/agenda";
var mongoose = require ('mongoose')
var Operaciones = require('./CRUD.js')
mongoose.connect(url)

Operaciones.insertarUsuario((error,result)=>{
  if(error)console.log("Error insert registros: " + console.error)
  console.log(result)
})
