<?php

function generatePoints() {
        $points = [];
        $stop=0;
        $Xo=1;
        $a=2;
        $m=10000;
        $modulo=0;
        $x=0;
        do{
            $x=$Xo*$a;
            if($x<$m){
                foreach($points as $point){
                   if($point[0]==$x && $point[1]==$m){
                    $stop=1;
                   }
                }
                if($stop!==1){
                $points[]= [$x,$m];
                $Xo=$x;
                }
            }
            if($x>$m){
                $modulo=$x%$m;
                $x=$modulo;
                foreach($points as $point){
                    if($point[0]==$x && $point[1]==$m){
                     $stop=1;
                    }
                 }
                 if($stop!==1){
                 $points[]= [$x,$m];
                 $Xo=$x;
                 }
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
