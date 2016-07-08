
package main

import (
    "os"
    "fmt"
    irc "github.com/fluffle/goirc/client"
)

func sendMessage(conn *irc.Conn, destination string, message string) {
    conn.Privmsg(destination, message)
    conn.Quit("Work done!")
}

func main() {
    if len(os.Args) != 3 {
        fmt.Println("Parameter error")
        os.Exit(1)
    }
    destination := os.Args[1]
    message := os.Args[2]

    cfg := irc.NewConfig("Dilebot")
    //cfg.SSL = true
    cfg.Server = "irc.rezosup.org"
    cfg.NewNick = func(n string) string { return n + "_" }
    c := irc.Client(cfg)

    // Join handler
    c.HandleFunc(irc.JOIN,
        func(conn *irc.Conn, line *irc.Line) {
            fmt.Printf("Join handler\n")
            sendMessage(conn, destination, message)
        })

    // Mode handler
    c.HandleFunc(irc.MODE,
        func(conn *irc.Conn, line *irc.Line) {
            fmt.Printf("Mode handler\n")
            if (destination[0] == '#') {
                // if channel, join the channel
                conn.Join(destination)
            } else {
                sendMessage(conn, destination, message)
            }
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

