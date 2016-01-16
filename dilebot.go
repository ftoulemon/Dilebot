
package main

import (
    "os"
    "fmt"
    irc "github.com/fluffle/goirc/client"
)

func main() {
    if len(os.Args) != 2 {
        fmt.Println("Parameter error")
        os.Exit(1)
    }
    toSend := os.Args[1]
    fmt.Println(toSend)


    cfg := irc.NewConfig("Dilebot")
    //cfg.SSL = true
    cfg.Server = "irc.rezosup.org"
    cfg.NewNick = func(n string) string { return n + "_" }
    c := irc.Client(cfg)

    // Join handler
    c.HandleFunc(irc.JOIN,
        func(conn *irc.Conn, line *irc.Line) {
            fmt.Printf("Join handler\n")
            conn.Privmsg("#taiste", os.Args[1])
            conn.Quit("Work done!")
        })

    // Mode handler
    c.HandleFunc(irc.MODE,
        func(conn *irc.Conn, line *irc.Line) {
            fmt.Printf("Mode handler\n")
            conn.Join("#taiste")
        })

    // join channel on connect
    c.HandleFunc(irc.CONNECTED,
        func(conn *irc.Conn, line *irc.Line) {
            fmt.Printf("Connect handler\n")
            conn.Privmsg("nickserv", "identify test")
        })

    // Handle disconnect
    quit := make(chan bool)
    c.HandleFunc(irc.DISCONNECTED,
        func(conn *irc.Conn, line *irc.Line) {
            fmt.Print("Disconnected\n")
            quit <- true
        })

    // Tell client to connect
    if err := c.Connect(); err != nil {
        fmt.Printf("Connection error: %s\n", err.Error())
    }

    <-quit
}

