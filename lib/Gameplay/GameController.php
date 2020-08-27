<?php


namespace Gameplay;


class GameController
{
    public function __construct($post, Game $game)
    {
        $this->game = $game;
        if (isset($post['coordinate'])) {
            if($this->game->checkBoard()){
                $undo = $this->game->getTemp();
                $this->game->CheckedBoard($undo);
                $this->game->unsetCheckBoard();
            }
            $coordinates = strip_tags($post['coordinate']);
            $location = explode(",", $coordinates);
            $r = $location[0];
            $c = $location[1];
            $this->game->changeClick($r,$c);
            $this->redirect = "/~diassimr/exam/hitori.php";
        }
        else if(isset($post['newgame'])) {
            $this->game->startGame();
            $this->redirect = "/~diassimr/exam/hitori.php";
        }
        else if(isset($post['giveup'])) {
            $this->game->setGiveUp();
            $this->game->giveUpGame();
            $this->redirect = "/~diassimr/exam/hitori.php";
        }
        else if(isset($post['check'])){
            $this->game->setCheckBoard();
            $currentGrid = $this->game->getCheck();
            $this->game->saveTemp($currentGrid);
            $newcheck = $this->game->checkBoardVal();
            $this->game->CheckedBoard($newcheck);
            $this->redirect = "/~diassimr/exam/hitori.php";
        }
        else if(isset($post['uncheck'])){
            $this->game->unsetCheckBoard();
            $undo = $this->game->getTemp();
            $this->game->CheckedBoard($undo);
            $this->redirect = "/~diassimr/exam/hitori.php";
        }
        else if(isset($post['goodbye'])) {
            $this->game->resetGame();
            $this->redirect = "/~diassimr/exam";
        }
    }

    public function getRedirect()
    {
        return $this->redirect;
    }


    private $redirect;
}