function getHello(req, res){
    res.status(200).send({
        msg: "Hola mundo desde el controllers",
    })
}

module.exports = {
    getHello,
}