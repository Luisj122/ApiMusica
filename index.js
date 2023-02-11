const mongoose = require('mongoose');
const app = require('./app')
const port = 3000
const urlMongo = "mongodb+srv://luisjimenez:RLbkn7qHlmkHX7AW@cluster0.afrk872.mongodb.net/test";

mongoose.set('strictQuery', false);

mongoose.connect(urlMongo,{useNewUrlParser: true, useUniFiedTopology: true}, (err, res) => {
  try {
    if (err) {
      throw err;
    }else{
      console.log("Conectado a mongo, ok");

      //Servidor web de node.js
      app.listen(port, () => {
        console.log(`Example app listening on port ${port}`)
      })

    }
  }catch (error){
    console.error(error);
  }

});
