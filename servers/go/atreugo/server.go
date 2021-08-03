package main

import (
	"github.com/savsgio/atreugo/v11"
)

func main() {
	config := atreugo.Config{
		Addr: "0.0.0.0:80",
	}
	server := atreugo.New(config)

	server.GET("/", func(ctx *atreugo.RequestCtx) error {
		return ctx.TextResponse("<h1>Hello World</h1>")
	})

	server.ListenAndServe()
}