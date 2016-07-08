<html>
    <head>
        <title>IRC bot</title>
    </head>
    <body style="background-color:black; color:lightgrey;">

    <h1>OK</h1>
    <p>Message: <?php echo $_POST["message"]; ?></p>

    <p>Output:</p>

    <?php
        $command = "./dilebot " . $_POST["destination"] . " \"" . $_POST["message"] . "\" 2>&1";
        exec($command, $output, $return_val);
        var_dump($output);
    ?>

    </body>
</html>
