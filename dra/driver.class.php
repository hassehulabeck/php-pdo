<?php

class Driver
{
    private $name;
    private $progressMeter = 0;
    private $tries = 0;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function guess($nextRoad)
    {
        $this->tries++;
        $alternatives = [
            "R" => 4,
            "L" => 4,
            "S" => 4
        ];
        $altBits = [];
        $progress = $this->readProgress();
        if ($progress) {
            foreach ($progress as $bit) {
                /* Alternatives innehåller alla möjliga vägar. Minska med en för varje bit som är sparad i progress. Bit[0] är bokstaven. */
                switch ($bit[0]) {
                    case 'L':
                        $alternatives['L']--;
                        break;
                    case 'R':
                        $alternatives['R']--;
                        break;
                    case 'S':
                        $alternatives['S']--;
                        break;
                    default:
                        echo "Weird";
                }
            }
        }
        // Skapa en alternativeBits av informationen i alternatives.
        foreach ($alternatives as $bit => $amount) {
            for ($i = 0; $i < $amount; $i++) {
                $altBits[] = $bit;
            }
        }
        $slump = mt_rand(0, count($altBits) - 1);
        $randomBit = $altBits[$slump];
        if ($randomBit == $nextRoad) {
            echo "<p>->";
            $this->progressMeter++;
            $this->writeProgress($randomBit . ", " . $this->progressMeter);
        }
        return $randomBit;
    }

    public function getProgressMeter()
    {
        return $this->progressMeter;
    }

    private function readProgress()
    {
        // Om det är första gången, radera tidigare filinnehåll.
        if ($this->progressMeter == 0) {
            $fh = fopen('progress.csv', 'w');
            fclose($fh);
        }

        $progress = file('progress.csv');
        if ($progress) {
            return $progress;
        }
        return false;
    }

    private function writeProgress($bit)
    {
        $fh = fopen('progress.csv', 'a');
        // Sista gången, lägg till antalet försök.
        if ($this->progressMeter == 12) {
            $bit .= ", Antal försök: " . $this->tries;
        }
        fwrite($fh, $bit . PHP_EOL);
        fclose($fh);
    }

    public function getName()
    {
        return $this->name;
    }
}
