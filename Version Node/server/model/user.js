var mongoose = require('mongoose');

var userSchema = mongoose.Schema({
    //_id: mongoose.Schema.Types.ObjectId,
    Id: {
      type : String,
      required: true,
      unique: true
    },
    Usuario: {
      type: String,
      required: true
    },
    Contrasena: {
      type: String,
      required: true
    },
});

var user = mongoose.model('User', userSchema);

module.exports = user;
