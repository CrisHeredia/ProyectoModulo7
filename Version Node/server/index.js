const http=require('http'),
      path=require('path'),
      RoutingUsuarios=require('./rutasUsuarios'),
      RoutingEventos=requiere('./rutasEventos'),
      express=require('express'),
      session=require('express-session')
      bodyParser=require('body-parser'),
      MongoClient = require('mongodb').MongoClient;
      mongoose = require ('mongoose')
      url = "mongodb://localhost/agenda";
      mongoose.connect(url, {useMongoClient: true}, function(error){
        if(error){
           console.log(error.name + " "+ error.message);
        }else{
           console.log('Conectado a MongoDB');
        }
      });


const PORT=8082
const app=express()
const Server=http.createServer(app)

app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended:true}))
app.use(express.static('../client'))
app.use('/usuarios',RoutingUsuarios)
app.use('/eventos',RoutingEventos)
app.use(session({
    secret: 'secret-pass',
    cookie: { maxAge: 3600000 },
    resave: false,
    saveUninitialized: true,
  }));

Server.listen(PORT, function(){
  console.log('Server is listenig on PORT: '+PORT);
})
