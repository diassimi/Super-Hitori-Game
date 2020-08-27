<?php


namespace Gameplay;


class GameView
{
    public function __construct(Game $game)
    {
        $this->game = $game;
    }


    public function header(){
        $name = $this->game->getName();

        $html = <<<HTML
        
<form id="game" method="POST" action="game-post.php">
<fieldset>
<p>$name's Super Hitori</p>
HTML;

        return $html;
    }


    public function board(){
        $values = $this->game->getBoard();
        $checkvalues = $this->game->getCheck();

        $html = '<table>';
        for($r=0;  $r<count($values);  $r++) {
            $html .= '<tr>';
            $row = $values[$r];
            $checkrow = $checkvalues[$r];

            for($c=0; $c<count($row);  $c++) {
                if($checkrow[$c] === 0){
                    $html .= <<<HTML
<td class="unshaded"><button type="submit" name="coordinate" value=$r,$c>$row[$c]</button></td>
HTML;
                }
                else if($checkrow[$c] === 100){
                    $html .= <<<HTML
<td class="shaded"><button type="submit" name="coordinate" value=$r,$c>$row[$c]</button></td>
HTML;
                }
                else if($checkrow[$c] === 200){
                    $html .= <<<HTML
<td class="wrong"><button type="submit" name="coordinate" value=$r,$c>$row[$c]</button></td>
HTML;
                }
                else{
                    $html .= <<<HTML
<td><button type="submit" name="coordinate" value=$r,$c>$row[$c]</button></td>
HTML;
                }

            }
            $html .= '</tr>';
        }

        $html .= '</table>';


        return $html;
    }


    public function footer(){
        if($this->game->complete())
        {
            if($this->game->checkForWin()){
                $html = <<<HTML
<p>Solution is correct!</p>
<p><input type="submit" name="newgame" value="New Game"></p>
<p><a name="goodbye" href=index.php>Goodbye!</a></p>

</fieldset>
</form> 
HTML;
            }
            else{
                $html = <<<HTML
<p>Solution is Incorrect!</p>
<p><input type="submit" name="check" value="Check"></p>
<p><input type="submit" name="giveup" value="Give Up"></p>
<p><input type="submit" name="newgame" value="New Game"></p>
<p><a name="goodbye" href=index.php>Goodbye!</a></p>

</fieldset>
</form> 
HTML;
            }

        }
        else if($this->game->checkBoard()){
            $html = <<<HTML
<p><input type="submit" name="uncheck" value="Uncheck"></p>
<p><input type="submit" name="giveup" value="Give Up"></p>
<p><input type="submit" name="newgame" value="New Game"></p>
<p><a name="goodbye" href=index.php>Goodbye!</a></p>

</fieldset>
</form> 
HTML;
        }
        else if($this->game->gaveUp()){
            $html = <<<HTML
<p>Solution is correct!</p>
<p><input type="submit" name="newgame" value="New Game"></p>
<p><a name="goodbye" href=index.php>Goodbye!</a></p>

</fieldset>
</form> 
HTML;
        }
        else{
            $html = <<<HTML
<p><input type="submit" name="check" value="Check"></p>
<p><input type="submit" name="giveup" value="Give Up"></p>
<p><input type="submit" name="newgame" value="New Game"></p>
<p><a name="goodbye" href=index.php>Goodbye!</></p>
</fieldset>
</form> 
HTML;
        }


        return $html;
    }





}