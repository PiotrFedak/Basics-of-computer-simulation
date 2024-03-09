<?php 

namespace PHP\Classes;

class Date{
    
private int $day;
private int $month;
private int $year;

function __construct(){
    $this->day=date('d');
    $this->month=date('m');
    $this->year=date('Y');
}


public function getDay(){
    return $this->day;
}
public function GetMonth() {
    return  $this->month;
}

public function GetYear(){
    return $this->year;
}

public function SetYear(int $year){
    $this->year=$year;
}

public function SetDate(int $d,int $m,int $y){
    $this->day=$d;
    $this->month=$m;
    $this->year=$y;
}

}


?>