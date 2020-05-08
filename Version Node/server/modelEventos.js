var mongoose = require('mongoose');

var Schema = mongoose.Schema;


var eventoSchema = new Schema({
    Id: {type: Number, required: true},
    Titulo: {type: String, required: true},
    FInicio: {type: Date, required: true},
    FFin: {type: Date},
    HInicio: {type: Date},
    HFin: {type: Date},
    Duracion: {type: Boolean},
    FKUsuario: {type: Number, required: true}
})

var Evento = mongoose.model('Evento', eventoSchema);

module.exports = Evento;
