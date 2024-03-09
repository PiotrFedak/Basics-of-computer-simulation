<?php 

namespace PHP\Functions;

use PHP\Classes\Date;
use PHP\Classes\Users;
use PHP\Classes\Volume;


interface GetVolume{
  public function getVolume();

}


final class Book_Reservations implements GetVolume{
    private Users $user;
    private Volume $volume;
    private Date $date;
    private bool $status_reservation=false;

    
    function __construct(Users $user, Volume $volume, Date $d) {

        $this ->user=$user;
        $this ->volume=$volume;
        $this->date=$d;
        
       }

       public function DeleteBookReservation(){
        $this->user=null;
        $this->volume=null;
        $this->date=null;
        $this->status_reservation=null;
        echo("Usunięto rezerwacje").PHP_EOL;

       }
      public function BookReservation(){
        $user_id=$this->user->GetUserId();
        $email=$this->user->Getemail();
        $account_status=$this->user->GetAccountStatus();
        $volume_counter=$this->user->GetVolumeCounter();
        $max_volume=$this->user->GetMaxVolume();
        $title=$this->volume->GetTitle();
        $author=$this->volume->GetAuthor();
        $ISBN=$this->volume->GetISBN();
        $status=$this->volume->GetStatus();

        if($account_status==1){
          if($status==1){
            if($volume_counter<$max_volume){
              echo("Ksiązka ".$title." ".$author." ".$ISBN." została zarezerwowana dla użytkonwika ".$user_id." o emailu ".$email." w dniu ".$this->date->getDay()." ".$this->date->GetMonth()." ".$this->date->GetYear()).PHP_EOL;
              $this->status_reservation=true;
              $this->volume->SetStatus($this->status_reservation);
  
            }
            else{
              echo("Maksymalna ilość wypożyczonych książek").PHP_EOL;
            }
          }
          else{
                      echo("Ksiązka NIEDOSTĘPNA ").PHP_EOL;
                    }
         
        }
        else{
          echo("Konto jest nie aktywne").PHP_EOL;
        }

        

      } 

      public function GetReservationStatus(){
          return $this->status_reservation;
      }

      public function GetReservationDate(){
          return $this->date;
      }


      public function GetVolume(){
        return $this->volume;
      }  




      public function BookReservationTEST(){
        $user_id=$this->user->GetUserId();
        $email=$this->user->Getemail();
        $account_status=$this->user->GetAccountStatus();
        $volume_counter=$this->user->GetVolumeCounter();
        $max_volume=$this->user->GetMaxVolume();
        $title=$this->volume->GetTitle();
        $author=$this->volume->GetAuthor();
        $ISBN=$this->volume->GetISBN();
        $status=$this->volume->GetStatus();

        if($account_status==1){
          if($status==1){
            if($volume_counter<$max_volume){
              $this->status_reservation=true;
              $this->volume->SetStatus($this->status_reservation);
  
            }
            else{
            }
          }
          else{
                    }
         
        }
        else{
        }

        

      } 

}

?>