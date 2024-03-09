<?php 

namespace PHP\Classes;


abstract class Users {

   private int $User_id;
   private string $password;
   private string $email;
   private bool $account_status;
   private int $penalty_counter;
   private int $volume_counter;
   const  max_volume=0;


   function __construct(int $User_id,string $password, string $email, bool $account_status, int $penalty_counter, int $volume_counter) {

    $this ->User_id=$User_id;
    $this ->password=$password;
    $this ->email=$email;
    $this ->account_status=$account_status;
    $this ->penalty_counter=$penalty_counter;
    $this ->volume_counter=$volume_counter;
   }

   public function Getemail() {
    return $this->email;
    }

    public function Setemail(string $mail){
        $this->email=$mail;
    }

    public function Getpassword() {
        return  $this->password;
    }
    
    public function Setpassword(string $password ){
        $this->password = $password;
    }

    public function GetAccountStatus() {
        return $this->account_status;
    }

    public function SetAccountStatus(bool $status){
        $this->account_status=$status;
    }

    public function Getpenalty_counter() {
        return $this->penalty_counter;
    }


    public function Setpenalty_counter(int $penalty_counter) {
            $this ->penalty_counter = $penalty_counter;
    }
    
    public function GetUserId() {
        return $this->User_id;
    }

    public function GetVolumeCounter() {
        return $this->volume_counter;
    }
    public function SetVolumeCounter(int $n) {
        $this->volume_counter+=$n;
    }
    public function GetMaxVolume() {
        return $this::max_volume;
    }
}

?>