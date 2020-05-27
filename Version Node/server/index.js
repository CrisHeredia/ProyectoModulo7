const http = require('http'),
    path = require('path'),
    Routing = require('./rutas.js'),
    express = require('express'),
    bodyParser = require('body-parser'),
    mongoose = require('mongoose');
const PORT = 8082
const app = express()
const Server = http.createServer(app);
/* hacemos global al Mongoose */
mongoose.Promise = global.Promise;
mongoose.connect('mongodb://localhost/agenda')
/* definimos los estaticos y los json */
app.use(express.static('client'))
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({
    extended: true
}))
/* iniciacion deL ROOT EN APP*/
app.use('/app', Routing)
Server.listen(PORT, function() {
    console.log('Server is listeng on port: ' + PORT)
})
