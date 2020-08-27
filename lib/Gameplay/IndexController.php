<?php


namespace Gameplay;


class IndexController
{
    public function __construct($post, Game $game)
    {
        $name = strip_tags($post['name']);
        if($name === "")
        {
            $this->redirect = "/~diassimr/exam";
        }
        if(isset($post['startgame']) && $name !== ""){
            $game->setName($name);
            $game->startGame();
            $this->redirect = "/~diassimr/exam/hitori.php";
        }
        else{
            $this->redirect = "/~diassimr/exam";
        }
    }



    public function getRedirect()
    {
        return $this->redirect;
    }


    private $redirect;

}