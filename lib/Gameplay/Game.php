<?php


namespace Gameplay;


class Game
{

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function resetGame(){
        $this->name = "";
        $this->values = $values = [
            [8, 5, 4, 7, 7, 2, 3, 5],
            [6, 8, 7, 2, 5, 4, 5, 1],
            [7, 1, 4, 4, 6, 5, 2, 3],
            [2, 8, 3, 8, 7, 5, 3, 4],
            [5, 7, 8, 1, 3, 5, 6, 7],
            [1, 8, 2, 8, 5, 3, 4, 7],
            [5, 3, 6, 2, 1, 7, 7, 7],
            [5, 2, 5, 3, 4, 7, 8, 6]
        ];
        $this->checkvalues = $checkvalues = [
            [8, 5, 4, 7, 7, 2, 3, 5],
            [6, 8, 7, 2, 5, 4, 5, 1],
            [7, 1, 4, 4, 6, 5, 2, 3],
            [2, 8, 3, 8, 7, 5, 3, 4],
            [5, 7, 8, 1, 3, 5, 6, 7],
            [1, 8, 2, 8, 5, 3, 4, 7],
            [5, 3, 6, 2, 1, 7, 7, 7],
            [5, 2, 5, 3, 4, 7, 8, 6]
        ];
        $this->giveup = false;
        $this->check = false;
    }

    public function startGame(){
        $this->values = $values = [
            [8, 5, 4, 7, 7, 2, 3, 5],
            [6, 8, 7, 2, 5, 4, 5, 1],
            [7, 1, 4, 4, 6, 5, 2, 3],
            [2, 8, 3, 8, 7, 5, 3, 4],
            [5, 7, 8, 1, 3, 5, 6, 7],
            [1, 8, 2, 8, 5, 3, 4, 7],
            [5, 3, 6, 2, 1, 7, 7, 7],
            [5, 2, 5, 3, 4, 7, 8, 6]
        ];
        $this->checkvalues = $checkvalues = [
            [8, 5, 4, 7, 7, 2, 3, 5],
            [6, 8, 7, 2, 5, 4, 5, 1],
            [7, 1, 4, 4, 6, 5, 2, 3],
            [2, 8, 3, 8, 7, 5, 3, 4],
            [5, 7, 8, 1, 3, 5, 6, 7],
            [1, 8, 2, 8, 5, 3, 4, 7],
            [5, 3, 6, 2, 1, 7, 7, 7],
            [5, 2, 5, 3, 4, 7, 8, 6]
        ];
        $this->giveup = false;
        $this->check = false;
    }

    public function giveUpGame(){
        $this->values = $values = [
            [8, 5, 4, 7, 7, 2, 3, 5],
            [6, 8, 7, 2, 5, 4, 5, 1],
            [7, 1, 4, 4, 6, 5, 2, 3],
            [2, 8, 3, 8, 7, 5, 3, 4],
            [5, 7, 8, 1, 3, 5, 6, 7],
            [1, 8, 2, 8, 5, 3, 4, 7],
            [5, 3, 6, 2, 1, 7, 7, 7],
            [5, 2, 5, 3, 4, 7, 8, 6]
        ];
        $this->checkvalues = $checkvalues = [
            [0, 100, 0, 0, 100, 0, 0, 0],
            [0, 0, 0, 0, 0, 0, 100, 0],
            [0, 0, 100, 0, 0, 100, 0, 0],
            [0, 100, 0, 100, 0, 0, 100, 0],
            [100, 0, 0, 0, 0, 100, 0, 100],
            [0, 100, 0, 0, 100, 0, 0, 0],
            [0, 0, 0, 100, 0, 100, 0, 100],
            [100, 0, 0, 0, 0, 0, 0, 0]
        ];
    }



    /**
     * @param array $values
     */
    public function setBoard($values)
    {
        $this->values = $values;
    }

    /**
     * @return array
     */
    public function getBoard()
    {
        return $this->values;
    }

    /**
     * @return array
     */
    public function getCheck()
    {
        return $this->checkvalues;
    }


    public function changeClick($r,$c){
        if($this->checkvalues[$r][$c] != 0 && $this->checkvalues[$r][$c] != 100){
            $this->checkvalues[$r][$c] = 0;
        }
        else if($this->checkvalues[$r][$c] == 0){
            $this->checkvalues[$r][$c] = 100;
        }
        else if($this->checkvalues[$r][$c] === 100){
            $this->checkvalues[$r][$c] = 8;
            //$this->checkvalues[$r][$c] = values[$r][$c];
        }
    }



    public function checkForWin(){
        if($this->checkvalues === [
                [0, 100, 0, 0, 100, 0, 0, 0],
                [0, 0, 0, 0, 0, 0, 100, 0],
                [0, 0, 100, 0, 0, 100, 0, 0],
                [0, 100, 0, 100, 0, 0, 100, 0],
                [100, 0, 0, 0, 0, 100, 0, 100],
                [0, 100, 0, 0, 100, 0, 0, 0],
                [0, 0, 0, 100, 0, 100, 0, 100],
                [100, 0, 0, 0, 0, 0, 0, 0]
            ]){
            return True;
        }
        else{
            return False;
        }
    }

    public function checkBoardVal(){
        $values = $this->checkvalues;
        for($r=0;  $r<count($values);  $r++) {
            for($c=0; $c<count($values[$r]);  $c++) {
                if($values[$r][$c] === 0 || $values[$r][$c] === 100) {
                    if ($values[$r][$c] !== $this->solution[$r][$c]) {
                        $values[$r][$c] = 200;
                    }
                }
            }

        }
        return $values;
    }

    public function complete(){
        $values = $this->checkvalues;
        for($r=0;  $r<count($values);  $r++) {
            for($c=0; $c<count($values[$r]);  $c++) {
                if($values[$r][$c] != 0 && $values[$r][$c] != 100) {
                    return False;
                }
            }

        }
        return true;
    }

    public function gaveUp(){
        return $this->giveup;
    }

    public function setGiveUp(){
        $this->giveup = true;
    }

    public function checkBoard(){
        return $this->check;
    }

    public function setCheckBoard(){
        $this->check = true;
    }

    public function unsetCheckBoard(){
        $this->check = false;
    }


    public function CheckedBoard($newvalues)
    {
        $this->checkvalues = $newvalues;
    }

    public function saveTemp($values)
    {
        $this->temp = $values;
    }

    public function getTemp()
    {
        return $this->temp;
    }



    private $giveup = false;
    private $check = false;
    private $name = '';
    private $temp = [];

    private $checkvalues = [
        [8, 5, 4, 7, 7, 2, 3, 5],
        [6, 8, 7, 2, 5, 4, 5, 1],
        [7, 1, 4, 4, 6, 5, 2, 3],
        [2, 8, 3, 8, 7, 5, 3, 4],
        [5, 7, 8, 1, 3, 5, 6, 7],
        [1, 8, 2, 8, 5, 3, 4, 7],
        [5, 3, 6, 2, 1, 7, 7, 7],
        [5, 2, 5, 3, 4, 7, 8, 6]
    ];

    // Puzzle location values
    private $values = [
    [8, 5, 4, 7, 7, 2, 3, 5],
    [6, 8, 7, 2, 5, 4, 5, 1],
    [7, 1, 4, 4, 6, 5, 2, 3],
    [2, 8, 3, 8, 7, 5, 3, 4],
    [5, 7, 8, 1, 3, 5, 6, 7],
    [1, 8, 2, 8, 5, 3, 4, 7],
    [5, 3, 6, 2, 1, 7, 7, 7],
    [5, 2, 5, 3, 4, 7, 8, 6]
    ];

    // Puzzle solution
    // 0 = unshaded
    // 100 = shaded
    private $solution = [
    [0, 100, 0, 0, 100, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 100, 0],
    [0, 0, 100, 0, 0, 100, 0, 0],
    [0, 100, 0, 100, 0, 0, 100, 0],
    [100, 0, 0, 0, 0, 100, 0, 100],
    [0, 100, 0, 0, 100, 0, 0, 0],
    [0, 0, 0, 100, 0, 100, 0, 100],
    [100, 0, 0, 0, 0, 0, 0, 0]
    ];

}