const fastify = require('fastify')

const server = fastify({})

server.get('/', async (request, reply) => {
    reply.raw.end('<h1>Hello World!</h1>')
})

const start = async () => await server.listen(80, '0.0.0.0')

start()