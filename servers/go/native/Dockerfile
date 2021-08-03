FROM golang:alpine

WORKDIR /application

COPY server.go ./

EXPOSE 80

RUN go build server.go

CMD ["./server"]