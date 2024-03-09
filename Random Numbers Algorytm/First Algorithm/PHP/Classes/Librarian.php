<?php 

namespace PHP\Classes;

class Librarian{
    
private string $l_name;
private string $email;
private int $phone_number;

function __construct(string $name,string $mail,int $phone){
    $this->l_name=$name;
    $this->email=$mail;
    $this->phone_number=$phone;
}


public function getLName(){
    return $this->l_name;
}
public function Getemail() {
    return  $this->email;
}

public function Setemail(string $mail){
    $this->email=$mail;
}

public function Getphone_number() {
    return  $this->phone_number;
}

public function Setphone_number(int $phone_number){
    $this->phone_number=$phone_number;
}


}


?>