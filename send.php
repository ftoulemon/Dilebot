<html>
    <head>
        <title>IRC bot</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"
        media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <style>
            p.output {
                font-family: "Lucida Console", Monaco, monospace;
            }
        </style>
    </head>

    <body>
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>

    <nav class="top-nav green">
        <div class="container">
            <div class="nav-wrapper"><a class="page-title">IRC Bot</a></div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card-panel teal white-text">
                        <span class="card-title">
                            <?php echo $_POST["message"]; ?>
                        </span>
                        <p class="output">
                            <?php
                                $command = "./dilebot \"" . $_POST["dest"] . "\" \"" . $_POST["message"] . "\" 2>&1";
                                exec($command, $output, $return_val);
                                foreach($output as $line) {
                                    echo $line . "</br>";
                                }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    </body>
</html>
