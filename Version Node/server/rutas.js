const Router = require('express').Router();
const User = require('./model/user.js');
const EventCalendar = require('./model/event.js');
var mongoose = require('mongoose');


Router.post('/login', function(req, res) {
   var username = req.body.username
   var password = req.body.password

   User.findOne({Usuario:username},function (err, user){
      if(user){
        if(user.Contrasena == password)
          res.send('OK')
        else
          res.send('contraseña incorrecta')
        }
      else
        res.send('usuario no existe')
   })
})

Router.post('/all', function(req, res) {
    var username = req.body.usuario;
    User.findOne({Usuario:username},function (err, user){
       if(user){
         EventCalendar.find({user: user.id}).exec(function(err, docs) {
             if (err) {
                 res.status(500)
                 res.json(err)
             }
             res.json(docs)
           });
       }
     });
})


Router.post('/new', function(req, res) {
      var userid = req.body.userId;
      var fechaInicio = new Date(req.body.start);
      var fechaFin = new Date(req.body.end);
      User.findOne({Usuario:userid},function (err, user){
         if(user){
           var evento = new EventCalendar({
             _id: new mongoose.Types.ObjectId(),
             title: req.body.title,
             user: user.id,
             startDate: fechaInicio,
             endDate: fechaFin,
             startHour: fechaInicio.getHours(),
             endHour: fechaFin.getHours()
           });
           evento.save(function(error) {
               if (error) {
                   res.status(500)
                   res.json(error)
               }
               res.send("Registro guardado");
           });
         }
       });
    })


Router.post('/update', function(req, res) {
  EventCalendar.findByIdAndUpdate(req.body.id,
  {
    startDate: req.body.start,
    endDate: req.body.end,
    startHour: req.body.startHour,
    endHour: req.body.endHour
  },
  function(error, evento) {
    if (error) {
        res.status(500)
        res.json(error)
    }
    res.send("Registro actualizado");
  });
})

module.exports = Router
