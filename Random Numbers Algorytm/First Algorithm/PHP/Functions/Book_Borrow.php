<?php 


namespace PHP\Functions;

use PHP\Classes\Date;
use PHP\Classes\Users;
use PHP\Classes\Librarian;
use PHP\Classes\Volume;
use PHP\Functions\Book_Reservations;
use PHP\Functions\GetVolume;


final class Book_Borrow implements GetVolume{

    private Users $user;
    private Volume $volume;
    private Librarian $librarian;
    private Book_Reservations $book_reservation;
    private Date $dateborrow;
    private bool $reservation_status;
    private Date $datereservation;


    public function __construct(Users $user,Librarian $librarian,Book_Reservations $book_reservation, Date $d){
        $this->user=$user;
        $this->librarian=$librarian;
        $this->book_reservation=$book_reservation;
        $this->volume=$book_reservation->GetVolume();
        $this->reservation_status=$this->book_reservation->GetReservationStatus();
        $this->dateborrow=$d;
        $this->datereservation=$this->book_reservation->GetReservationDate();
    }

    public function BookBorrow(){
            $user_id=$this->user->GetUserId();
            $account_status=$this->user->GetAccountStatus();    
            $volume_counter=$this->user->GetVolumeCounter();
            $max_volume=$this->user->GetMaxVolume();
            $title=$this->volume->GetTitle();
            $author=$this->volume->GetAuthor();
            $ISBN=$this->volume->GetISBN();
            $date=$this->book_reservation->GetReservationDate();
            $l_name=$this->librarian->GetLName();

        if($account_status==1){
          if($volume_counter<$max_volume){
            if($this->reservation_status==true){
            $this->user->SetVolumeCounter(1);
            echo("Ksiązka ".$title." ".$author." ".$ISBN." została wyporzyczona przez użytkonwika ".$user_id." pod czas pracy ".$l_name." w dniu ".$this->dateborrow->getDay()." ".$this->dateborrow->GetMonth()." ".$this->dateborrow->GetYear()).PHP_EOL;
            }
            else{
                echo("Minał czas rezerwacji").PHP_EOL;
            }

          }
          else{
            echo("Maksymalna ilość wypożyczonych książek").PHP_EOL;
          }
        }
        else{
          echo("Konto jest nie aktywne").PHP_EOL;
        }

        
        }

    public function GetVolume(){
      return $this->volume;
    }  

    public function GetDateBorrow(){
      return $this->dateborrow;
    }





    public function Checkifexpired(){
      $day=$this->datereservation->getDay();
      $month=$this->datereservation->GetMonth();
      $year=$this->datereservation->GetYear();
      // Do sprawdzenia czy git z secenariuszem 
      //
      //
      //
      //
      $day+=3;
      if($year%4==0){
          if($month==2){
              if($day>29){
                  $day=$day-29;
                  $month++;
              }
          }
          else if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
              if($day>31){
                  $day=$day-31;
                  $month++;
              }
              if($month>12){
                  $month==1;
                  $year++;
              }

          }
          else{
              if($day>30){
                  $day=$day-30;
                  $month++;
              }

          }
      }
      else{
          if($day>28 && $month==2){
              $day=$day-28;
              $month++;
          }
          else if($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12){
          if($day>31){
              $day=$day-31;
              $month++;
          }
           if($month>12){
              $month==1;
              $year++;
          }
          }
          else{
              if($day>30){
                  $day=$day-30;
                  $month++;
               }

          }
      $dayreturn=$this->dateborrow->getDay();
      $monthreturn=$this->dateborrow->GetMonth();
      $yearreturn=$this->dateborrow->GetYear();
      if(($dayreturn>$day&&$month==$monthreturn&&$year==$yearreturn)||($dayreturn<=$day&&$month<$monthreturn&&$year==$yearreturn)){
          $this->reservation_status=false;
      }
      else{
          $this->reservation_status=true;
      }

  }
  



  }








    public function BookBorrowTEST(){
      $user_id=$this->user->GetUserId();
      $account_status=$this->user->GetAccountStatus();    
      $volume_counter=$this->user->GetVolumeCounter();
      $max_volume=$this->user->GetMaxVolume();
      $title=$this->volume->GetTitle();
      $author=$this->volume->GetAuthor();
      $ISBN=$this->volume->GetISBN();
      $date=$this->book_reservation->GetReservationDate();
      $l_name=$this->librarian->GetLName();

  if($account_status==1){
    if($volume_counter<$max_volume){
      if($this->reservation_status==true){
      $this->user->SetVolumeCounter(1);
      
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