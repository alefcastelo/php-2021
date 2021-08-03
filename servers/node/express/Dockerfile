FROM node:lts-alpine

WORKDIR /application

COPY package.json yarn.lock ./

RUN yarn install

COPY server.js .

EXPOSE 80

CMD ["node", "server.js"]