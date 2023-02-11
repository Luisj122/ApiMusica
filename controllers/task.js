const Task = require('../models/task');

async function createTask(req, res){

    const task = new Task();
    const params = req.body;

    task.title = params.title;
    task.description = params.description;

    try {
        const taskStore = await task.save();

        if(!taskStore){
            res.status(400).send({msg: "Tarea no guardada correctamente"});
        }else{
            res.status(200).send({task: taskStore})
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function getTask(req, res){
    try{
        const tasks = await Task.find({completed: false}).sort({ create_at: -1 });
        
        if(!tasks){
            res.status(404).send("Error al obtener las tareas");
        }else{
            res.status(200).send(tasks);
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function getTasks(req, res){
    const idTaks = req.params.id;
    try {
        const task = await Task.findById(idTaks);

        if(!task){
            res.status(404).send({msg: "No se a encontrado la tarea por id"});
        }else{
            res.status(200).send(task);
        }
        
    }catch(error){
        res.status(500).send(error);
    }
}

async function deleteTask(req, res){
    const idTask = req.params.id;

    try {
        //const task = await Task.deleteOne({ _id: idTask });
        const task = await Task.findByIdAndDelete(idTask);

        if(!task) {
            res.status(400).send({ msg: "No se ha encontrado esa tarea para borrar"});
        } else {
            res.status(200).send({ msg: "Tarea borrada", task: task });
        }
        
    } catch(error) {
        res.status(500).send(error);
    }
}

async function updateTask(req, res){
    const idTaks = req.params.id;

    //sacar los cambios de la tarea
    const bodyJson = req.body

    try {
        //const task = await Task.deleteOne({_id:idTaks});
        const task = await Task.findByIdAndUpdate(idTaks, bodyJson);

        if(!task){
            res.status(400).send({msg: "No se a encontrado la tarea para modificar"});
        }else{
            res.status(200).send({msg: "Tarea modificada", task: task});
        }
        
    }catch(error){
        res.status(500).send(error);
    }
}

module.exports = {
    createTask, getTask, getTasks, deleteTask, updateTask,
}