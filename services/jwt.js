const jwt = require('jsonwebtoken');

const SECRET_KEY = "aksjfnvjaks2132355225";

function createToken(user, expiresIn) {
    const { id, email } = user;
    const payload = { id, email };

    return jwt.sign(payload, SECRET_KEY, { expiresIn:expiresIn });
}

function decodeToken(token) {
    return jwt.decode(token, SECRET_KEY);
}

module.exports = {
    createToken, decodeToken, 
}