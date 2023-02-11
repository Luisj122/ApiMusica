const express = require('express');
const songController = require('../controllers/song');
const api = express.Router();

const md_auth = require('../middlewares/authenticated');
//Endpoint
api.post("/songs",[md_auth.ensureAuth] ,  songController.createSong);

api.get("/songs",[md_auth.ensureAuth] ,  songController.getSong);

api.get("/songs/toprated",[md_auth.ensureAuth] ,  songController.getToprated);

api.get("/songs/genero/:genero",[md_auth.ensureAuth] ,  songController.getGenero);

api.get("/songs/id/:id",[md_auth.ensureAuth] ,  songController.getId);

api.delete("/songs/id/:id",[md_auth.ensureAuth] ,  songController.deleteSong);

api.put("/songs/up/:id",[md_auth.ensureAuth] ,  songController.updateSong);




module.exports = api;