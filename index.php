<?php
require "./inc/inc.php";

// check username
if (
    isset($_POST["username"]) &&
    preg_match_all("/[A-Za-z0-9]/", $_POST["username"]) == strlen($_POST["username"]) &&
    strlen($_POST["username"]) <= 12
) {
    // check for create
    if (isset($_POST["create"])) {
        // create a game
        $game = (new Game($_POST["username"]))->createGame();

        if ($game) {
            session_start();
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["player"] = 1;
            header("Location: play.php?game=$game");

        } else $error["game"] = "game can not be created";
    }
    // if no create variable then check password else error
    else if (
        isset($_POST["password"]) &&
        preg_match_all("/[A-Za-z0-9]/", $_POST["password"]) == strlen($_POST["password"]) &&
        strlen($_POST["username"]) <= 12
    ) {
        // join a game
        $game = (new Game($_POST["username"]))->joinGame($_POST["password"]);

        if ($game) {
            session_start();
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["player"] = 2;

            header("Location: play.php?game=$game");
        } else $error["game"] = "can not find game";
    } else $error["password"] = "no use of special characters and max 12 characters";
} else $error["username"] = "no use of special characters and max 12 characters";


load("index.php");
