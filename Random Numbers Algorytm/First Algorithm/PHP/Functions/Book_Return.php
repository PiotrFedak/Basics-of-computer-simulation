<?php 

namespace PHP\Functions;

use PHP\Classes\Date;
use PHP\Classes\Users;
use PHP\Classes\Librarian;
use PHP\Classes\Volume;
use PHP\Functions\Book_Borrow;
use PHP\Interface\GetVolume;

final class Book_Return{
    private Book_Borrow $book_borrow;
    private Users $users;
    private Librarian $librarian;
    private Volume $volume;
    private Date $date;
    private Date $datebook;
    private bool $is_expired;
    private int $day_after_expired;

    public function __construct(Book_Borrow $borrow, Users $user, Librarian $librarian, Date $d){
        $this->book_borrow = $borrow;
        $this->users = $user;
        $this->librarian = $librarian;
        $this->volume=$this->book_borrow->GetVolume();
        $this->datebook=$this->book_borrow->GetDateBorrow();
        $this->date=$d;
    }

    public function ReturnBook(){
        $user_id=$this->users->GetUserId();
        $ISBN=$this->volume->GetISBN();
        $librarian=$this->librarian->GetLName();
        $this->Checkifexpired();
        if($this->is_expired==0){
            $this->users->SetVolumeCounter(-1);
            $this->volume->SetStatus(true);
            echo("Użytkownik ".$user_id." oddał książkę ".$ISBN." w terminie dnia ".$this->date->getDay()." ".$this->date->GetMonth()." ".$this->date->GetYear()." zakartekowane przez ".$librarian).PHP_EOL;
        }
        else{
            echo("Ksiązka po terminie").PHP_EOL;
            $expired= new Expired_Book($this->users,$this->day_after_expired);
            $expired->ReturnExpiredBook();
        }
        
        
    }

    public function Checkifexpired(){
        $day=$this->datebook->getDay();
        $month=$this->datebook->GetMonth();
        $year=$this->datebook->GetYear();
    
        $day+=20;
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
        $dayreturn=$this->date->getDay();
        $monthreturn=$this->date->GetMonth();
        $yearreturn=$this->date->GetYear();
        if(($dayreturn>$day&&$month==$monthreturn&&$year==$yearreturn)||($dayreturn<=$day&&$month<$monthreturn&&$year==$yearreturn)){
            $this->is_expired=true;
            $this->day_after_expired=$dayreturn-$day;
        }
        else{
            $this->is_expired=false;
        }

    }
    



    }
}



    
    

?>