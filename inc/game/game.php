<?php
class game
{
    private $username;
    private $db;

    /**
     * @param string $username of user
     */
    public function __construct($username)
    {
        $this->username = $username;
        $this->db = new db_functions();
    }

    public function createGame()
    {
        $deck = json_decode(file_get_contents("https://deckofcardsapi.com/api/deck/new/shuffle/?deck_count=1"));

        $gamePassword = $deck->deck_id;

        $game_session = $this->db->make_game($deck->deck_id, $gamePassword, $this->username);
        if ($game_session) return $gamePassword;
        else return false;
    }

    /**
     * @param string $password the password of the game
     */
    public function joinGame($password)
    {
        $registered = $this->db->registerPlayer2($this->username, $password);
        $game_session = $this->db->getGame($password);

        if ($game_session && $registered) return $password;
        else return false;
    }
}
