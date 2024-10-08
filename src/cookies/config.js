const express = require('express');
const user    = require('../auth/authToken')

const router  = express.Router();

router.get('/', (req, res) => {
    const token = req.cookies.token || req.headers.authorization;
    if (!token) {
      return res.status(401).json({ message: 'No token provided' });
    }

    res.json({ message: user.decodeHeader(req)});
});

module.exports = router;