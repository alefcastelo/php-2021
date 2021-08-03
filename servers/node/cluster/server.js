const http = require('http');
const cluster = require('cluster');
const numCPUs = require('os').cpus().length;


if (cluster.isMaster) {
    for (let i = 0; i < numCPUs; i++) {
        cluster.fork();
    }
}

if (cluster.isWorker) {
    http.createServer((req, res) => {
        res.end('<h1>Hello World</h1>');
    }).listen(80, '0.0.0.0');
}