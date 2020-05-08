var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost/agenda_db";
var mongoose = require ('mongoose')
var Operaciones = require('./CRUD.js')
mongoose.connect(url, {useMongoClient: true}, function(error){
  if(error){
     console.log(error.name + " "+ error.message);
  }else{
     console.log('Conectado a MongoDB');
  }
});

Operaciones.insertarUsuario((error,result)=>{
  if(error)console.log("Error insert registros: " + console.error)
  console.log(result)
})
