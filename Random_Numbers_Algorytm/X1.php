<?php

function generatePoints() {
        $points = [];
        $stop=0;
        $Xo=1;
        $a=2;
        $m=1000;
        $modulo=0;
        $x=0;
        do{
            $x=$Xo*$a;
            if($x<$m){
                $result=$x/$m;
                foreach($points as $point){
                   if($point[0]==$result){
                    $stop=1;
                   }
                }
                if($stop!==1){
                $result=$x/$m;
                $points[]= [$result];
                $Xo=$x;
                }
            }
            if($x>$m){
                $modulo=$x%$m;
                $x=$modulo;
                $result=$x/$m;
                foreach($points as $point){
                    if($point[0]==$result){
                     $stop=1;
                    }
                 }
                 if($stop!==1){
                $points[]= [$result];
                 $Xo=$x;
                 }
            }
        }while($stop!==1);
        return $points;
    }



    $points = generatePoints();
    $suma=0;
    $all=0;
    $table = [];
foreach ($points as $point) {
   $suma+=exp(pow(-$point[0],2));
   $all+=1;
}
$average=$suma/$all;

echo $average.("  śrenia  dla ").$all."\n";


