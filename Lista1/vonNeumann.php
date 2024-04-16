<?php

function generatePoints() {
        $points = [];
        $stop =0;
        $Xo=1612;
        $m=4;
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
            echo $numberString."\n";
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
    $max=0;
    $lib=[];


foreach ($points as $point) {
    echo $point[0]."\n";
    if($point[0]>$max){
        $max=$point[0];
    }
}

foreach ($points as $point) {
        $lib[]=$point[0]/$max;  
}

foreach ($lib as $l){
    $suma+=$l;
    $all++;
}


$average=$suma/$all;
echo $average.("  śrenia  dla ").$all."\n";

?>
