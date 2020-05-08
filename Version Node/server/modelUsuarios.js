var mongoose = require('mongoose');

var Schema = mongoose.Schema;

var userSchema = new Schema({
    Id: {type: Number, required: true},
    Usuario: {type: String, required: true},
    Contrasena: {type: String, required: true}
})

var User = mongoose.model('User', userSchema);

module.exports = User;
