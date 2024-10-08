require('dotenv').config();

module.exports = {
    app: {
        port: process.env.PORT || 6000,
    },
    jwt:{
        secret: process.env.JET_SECRET
    },     
    mysql: {
        host: process.env.DB_HOST,
        username: process.env.DB_USERNAME,
        password: process.env.DB_PASSWORD,
        database: process.env.DB_DATABASE
    }
}
