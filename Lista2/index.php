<?php

function generatePoints() {
        $points = [];
        $stop=0;
        $Xo=6;
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
    $table;
    $i=0;
do{
    $a=$points[$i][0];
    $b=$points[$i+1][0];
    echo $a." ".$b."\n";
    $operation=pow(1-$a,3)*((256/27)*$a);
    if($b<=$operation){
        $table=$a;
    }
    $i++;
}while($table!=true);

    echo $table."\n";


