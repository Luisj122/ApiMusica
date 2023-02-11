const Song = require('../models/song');

async function createSong(req, res){

    const song = new Song();
    const params = req.body;


    song.titulo = params.titulo;
    song.grupo = params.grupo;
    song.duracion = params.duracion;
    song.anio = params.anio;
    song.genero = params.genero;
    song.puntuacion = params.puntuacion;


    try {
        const songStore = await song.save();

        if(!songStore){
            res.status(400).send({msg: "Cancion no guardada correctamente"});
        }else{
            res.status(200).send({song: songStore})
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function getSong(req, res){
    try{
        const songs = await Song.find();
        
        if(!songs){
            res.status(404).send("Error al obtener las Canciones");
        }else{
            res.status(200).send(songs);
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function getToprated(req, res){
    try{
        const songs = await Song.find().sort({ puntuacion: -1 }).limit(10);
        
        if(!songs){
            res.status(404).send("Error al obtener las canciones");
        }else{
            res.status(200).send(songs);
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function getGenero(req, res){

    const generoB = req.params.genero;
    try{
        const songs = await Song.find({genero : generoB});
        
        if(!songs){
            res.status(404).send("Error al obtener las canciones");
        }else{
            res.status(200).send(songs);
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function getId(req, res){

    const cancionId = req.params.id;
    try{
        const songs = await Song.findById(cancionId);
        
        if(!songs){
            res.status(404).send("Error al obtener las canciones");
        }else{
            res.status(200).send(songs);
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function deleteSong(req, res){

    const cancionId = req.params.id;
    try{
        const songs = await Song.findByIdAndDelete(cancionId);
        
        if(!songs){
            res.status(404).send("Error al obtener las canciones");
        }else{
            res.status(200).send(songs);
        }
    }catch(error){
        res.status(500).send(error);
    }
}

async function updateSong(req, res) {

    const idCancion = req.params.id;
    const cuerpo = req.body;
    cuerpo.puntuacion;


    try {
        const songs = await Song.findByIdAndUpdate(idCancion,
            { $inc: { puntuacion: cuerpo.puntuacion } });
        if (!songs) {
            res.status(400).send("error al actualizar la cancion" )
        } else {
            res.status(200).send(songs)
        }
    } catch (error) {
        res.status(500).send(error);
    }

}

module.exports = {
    createSong, getSong, getToprated, getGenero, getId, deleteSong, updateSong,
}