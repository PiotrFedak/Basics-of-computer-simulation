<?php

function generatePoints() {
        $points = [];
        $stop =0;
        $Xo=3622;
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
            $middleIndex = floor($length / 2);
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
                $points[]= [$int,$numberString];
                $Xo=$int;
                }
           
        }while($stop!==1);
        return $points;
    }



    $points = generatePoints();

foreach ($points as $point) {
    echo $point[0].(" ");
    echo $point[1]. "\n";
}


?>
