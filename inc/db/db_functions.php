<?php
class db_functions extends db_connection
{
    /**
     * @param string $deck_id the deck_id to use in game
     * @param string $password the password to login to game
     * @param string $player1 the username of creator of the game 
     */
    public function make_game($deck_id, $password, $player1) {
        $this->removeUnusedGames();

        return $this->createData(
            "INSERT INTO game_sessions(deck_id, password, player1)
            VALUES ('$deck_id','$password','$player1')"
        );
    }

    /**
     * @param string $password the password to login to game
     */
    public function getGame($password)
    {
        $r = $this->getData(
            "SELECT * FROM game_sessions WHERE password = '$password'"
        );
        if($r) return $r[0];
        else return false;
    }

    /**
     * @param string $player2 the username of second player
     * @param string $password the password of game to register 
     */
    public function registerPlayer2($player2, $password)
    {
        return $this->updateData(
            "UPDATE game_sessions SET player2 = '$player2' WHERE game_sessions.password = '$password'"
        );
    }

    /**
     * removes all unused games in database
     */
    private function removeUnusedGames()
    {
        $this->deleteData(
            "DELETE FROM game_sessions WHERE DATEDIFF(game_sessions.timestamp, CURRENT_TIMESTAMP) != 0"
        );

        $this->deleteData(
            "DELETE FROM game_sessions WHERE game_sessions.state = 'done'"
        );
    }
}