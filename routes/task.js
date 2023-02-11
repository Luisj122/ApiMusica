const express = require('express');
const TaskController = require('../controllers/task');
const api = express.Router();

const md_auth = require('../middlewares/authenticated');
//Endpoint
api.post("/task", TaskController.createTask);

//Consultar task
api.get("/task", [md_auth.ensureAuth] , TaskController.getTask);

//Consultar una tarea
api.get("/task/:id", TaskController.getTasks);

//Borrar tarea por id
api.delete("/task/:id", TaskController.deleteTask);

//Actualizar una tareapd
api.put("/task/:id", TaskController.updateTask);

module.exports = api;