FROM golang:alpine

WORKDIR /application

COPY server.go ./

EXPOSE 80

RUN go mod init go-atreugo
RUN go get github.com/savsgio/atreugo/v11

RUN go build server.go

CMD ["./server"]