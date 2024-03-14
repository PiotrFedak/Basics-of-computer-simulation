<?php

function generatePoints() {
        $points = [];
        $stop =0;
        $Xo=12;
        $m=2;
        do{
            $y=pow($Xo,2);
            $length = strlen((string)abs($y));
            $desireLenght=2*$m;
            if($length != $desireLenght){
                $numberString = str_pad($y, max($desireLenght, strlen((string)$y)), '0', STR_PAD_LEFT);
            }
            if($length == $desireLenght){
                $numberString=strval($y);
            }
            $middleIndex = floor($desireLenght / 2);
            $halfDesiredLength = $m / 2; 
            $startIndex = $middleIndex - $halfDesiredLength;
            $endIndex = $middleIndex + $halfDesiredLength - 1;
            $middleDigits = substr($numberString, $startIndex, $endIndex - $startIndex + 1);
            $int = intval($middleDigits);
                foreach($points as $point){
                   if($point[0]==$int){
                    $stop=1;
                   }
                }
                if($stop!==1){
                $points[]= [$int];
                $Xo=$int;
                }
           
        }while($stop!==1);
        return $points;
    }



    $points = generatePoints();
    $suma=0;
    $all=0;
    $table = [];

foreach ($points as $point) {
   $suma+=$point[0];
   $all++;
}
$average=$suma/$all;
echo $average.("  śrenia  dla ").$all."\n";

for ($i=0; $i<$all-1; $i++ ) {
    $table[]=[$points[$i],$points[$i+1]];
}

foreach ($table as $tab) {
    echo $tab[0][0].(" ");
    echo $tab[1][0].(" ") ."\n";
}

?>
