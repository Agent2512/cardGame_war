<?php





// var_dump($_POST);
if(isset($_POST["create"]) && isset($_POST["username"])){
    // make a new game room
    print_r("<pre>Creating new game room</pre>");
}
else if(!isset($_POST["create"]) && isset($_POST["username"]) && isset($_POST["password"])){
    // connect to a game room
    print_r("<pre>Connecting to game room</pre>");
}













require("template.php");load("index.php");