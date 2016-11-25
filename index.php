<html>
    <head>
        <title>IRC bot</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"
        media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        function showProgress(btn) {
            btn.style.display = "none";
            document.getElementById("progressAnim").style.display = "block";
        }
    </script>

    <nav>
        <div class="nav-wrapper z-depth-3 green">
            <a href="#" class="brand-logo"><i class="material-icons">message</i>Dilebot</a>
            <ul class="right">
                <li><a href="#" onclick="window.location.href = window.location.port + '//' + window.location.hostname;"><i class="material-icons">home</i></a></li>
            </ul>
        </div>
    </nav>

    <main>
        <div class="container">
            <form action="send.php" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="destination" name="dest" type="text" value="#moule" class="validate">
                        <label for="destination">Destination</label><br>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="message" name="message" type="text" class="validate">
                        <label for="message">Message</label><br>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light green" type="submit" name="action" onclick="showProgress(this);">Submit
                        <i class="material-icons right">send</i>
                    </button>
                    <div id="progressAnim" class="progress" style="display:none">
                        <div class="indeterminate"></div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    </body>
</html>
