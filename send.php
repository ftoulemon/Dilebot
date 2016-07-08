<html>
    <head>
        <title>IRC bot</title>
        <style>
            p.output {
                font-family: "Lucida Console", Monaco, monospace;
            }
        </style>
    </head>
    <body style="background-color:black; color:lightgrey;">

    <h1>OK</h1>
    <p>Message: <?php echo $_POST["message"]; ?></p>

    <p>Output:</p>

    <p class="output">
    <?php
        $command = "./dilebot " . $_POST["destination"] . " \"" . $_POST["message"] . "\" 2>&1";
        exec($command, $output, $return_val);
        foreach($output as $line) {
            echo $line . "</br>";
        }
    ?>
    </p>

    </body>
</html>
