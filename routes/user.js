const express = require('express');
const UserController = require('../controllers/user');
const api = express.Router();

//Endpoint
api.post("/user", UserController.register);

//Login usuario. Devuelve un token para luego hacer las llamadas api
api.post("/login", UserController.login);

module.exports = api;