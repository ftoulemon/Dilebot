# IRC quick send

This project provides a simple interface to send a message on IRC.

## Why?

I use [IrssiNotifier](https://irssinotifier.appspot.com/) to get IRC notifications on my phone, and I wanted to be able to send back messages or share links.

## How?

The user's message is sent to a small Go program which connects to the IRC server and sends the message.

## Web UI

The webpage uses [mechanizecss](http://materializecss.com/).

<img src="https://raw.githubusercontent.com/ftoulemon/Dilebot/master/img/screenshot.png" width="400">

## Go client

The Go script uses [goirc](https://github.com/fluffle/goirc/). I also use this script to be notified of events from my server.

