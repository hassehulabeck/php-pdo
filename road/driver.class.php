<?php


class Driver
{

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function guess($guessMaterial, $correctGuesses, $road)
    {
        while ($correctGuesses < count($road)) {
            $slump = mt_rand(0, count($guessMaterial) - 1);

            $myGuess = $guessMaterial[$slump];

            echo "<p>" . $myGuess;

            if ($myGuess == $road[$correctGuesses]) {
                $correctGuesses++;
                array_splice($guessMaterial, $slump, 1);
                echo " Rätt";
            }
        }
    }
}
