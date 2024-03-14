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
    $x=0;
    $y=0;
    $sumlogic=0;
    $result=0;

foreach ($points as $point) {
   $suma+=exp(-pow($point[0],2));
   $all+=1;
}

$average=$suma/$all;

for ($i=0; $i<$all-1; $i++ ) {
    $table[]=[$points[$i],$points[$i+1]];
}

foreach($table as $tab){
    $x=$tab[0][0];
    $y=$tab[1][0];
    if(pow((2*$x-1),2)+pow((2*$y-1),2)<=1) {
    $sumlogic+=1;
    }
}
echo $sumlogic."\n ";
echo $average.("  śrenia  dla ").$all."\n";
$result=4*($sumlogic/($all-1));

echo $result." Wynik";

