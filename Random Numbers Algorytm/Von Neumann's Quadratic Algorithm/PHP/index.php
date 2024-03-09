<?php

use PHP\Classes\Books;
use PHP\Classes\Date;
use PHP\Classes\Students;
use PHP\Classes\Librarian;
use PHP\Functions\Book_Borrow;
use PHP\Functions\Book_Reservations;
use PHP\Functions\Book_Return;

require "./vendor/autoload.php";
$date1=new Date();
$date1->Setdate(1,5,2023);
$date2=new Date();
$date2->SetDate(3,5,2023);
$date3=new Date();
$date3->SetDate(17,5,2023);
$date4=new Date();
$date4->SetDate(7,5,2023);
$date5=new Date();
$date5->SetDate(30,5,2023);

$bibliotekarz=new Librarian("Ryszard","ryszard420@gmail.com","500492666");

$scenariusz;
do {
echo("Wybierz scenariusz: ").PHP_EOL;  
echo("Scenariusz 1: Rezerwacja książki").PHP_EOL;  
echo("Scenariusz 2: Rezygnacja z Rezerwacji").PHP_EOL;  
echo("Scenariusz 3: Wypożyczenie kasiązki").PHP_EOL;    
echo("Scenariusz 4: Oddanie Ksiązki").PHP_EOL;   
$scenariusz=readline("Podaj numer scenariusza :");
echo("$scenariusz");
}while($scenariusz<1 || $scenariusz>4);


if($scenariusz==1){

    do{
        echo("Wybierz rodzaj scenariusza: ").PHP_EOL;
        echo("Scenariusza główny - 1").PHP_EOL; 
        echo("Scenariusza alternatywny przekroczony limit wypożyczeń - 2").PHP_EOL; 
        echo("Scenariusza alternatywny brak możliwości rezerwacji: - 3").PHP_EOL;
        echo("Scenariusza alternatywny nie aktywne konto - 4").PHP_EOL;
        $wybór=readline("Podaj numer scenariusza :");
    }
    while($wybór<1 || $wybór>4);


    if($wybór==1){
        $user=new Students(1,"123","KAmil@gmail.com",true,0,0);
        $book=new Books("JAk zarobić pieniądze na książce","Jordz Biznes",12312312,"Nowa Era",1999,true);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservation();

    }
    if($wybór==2){
        $user=new Students(2,"123","DArek@gmail.com",true,0,5);
        $book=new Books("W Pustyni i w puszczy","Henryk Sienkiewicz",12312312,"Książkix",2137,true);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservation();
}

    if($wybór==3){
        $user=new Students(3,"123","PAweł@gmail.com",true,0,0);
        $book=new Books("KAjko i Kokosz","GAl Anonim",12312312,"Książkix",2137,false);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservation();
    }

    if($wybór==4){
        $user=new Students(3,"123","Makumba@gmail.com",false,0,0);
        $book=new Books("Poezja o Borsukach","Szyszborska",12312312,"Przyrodix",2137,true);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservation();
    }
}

if($scenariusz==2){

        $user=new Students(3,"123","Makumba@gmail.com",false,0,0);
        $book=new Books("Poezja o Borsukach","Szyszborska",12312312,"Przyrodix",2137,true);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservationTEST();
        unset($rezerwacja);
        echo("Usunięto rezerwacje").PHP_EOL;
        
   
}

if($scenariusz==3){
    do{
        echo("Wybierz rodzaj scenariusza: ").PHP_EOL;
        echo("Scenariusza główny - 1").PHP_EOL;
        echo("Scenariusza alternatywny minął termin reerwacji - 2").PHP_EOL;
        echo("Scenariusza alternatywny brak rezerwacji: - 3").PHP_EOL;
        $wybór=readline("Podaj numer scenariusza :");
    }
    while($wybór<1 || $wybór>3);

    if($wybór==1){
         
        $user=new Students(1,"123","KAmil@gmail.com",true,0,0);
        $book=new Books("JAk zarobić pieniądze na książce","Jordz Biznes",12312312,"Nowa Era",1999,true);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservationTEST();
        $wypozyczenie=new Book_Borrow($user,$bibliotekarz,$rezerwacja,$date2);
        $wypozyczenie->Checkifexpired();
        $wypozyczenie->BookBorrow();
        echo("").PHP_EOL;
    }

    if($wybór==2){
        $user=new Students(1,"123","KAmil@gmail.com",true,0,0);
        $book=new Books("JAk zarobić pieniądze na książce","Jordz Biznes",12312312,"Nowa Era",1999,true);
        echo("").PHP_EOL;
        $rezerwacja=new Book_Reservations($user,$book,$date1);
        $rezerwacja->BookReservationTEST();
        $wypozyczenie=new Book_Borrow($user,$bibliotekarz,$rezerwacja,$date4);
        $wypozyczenie->Checkifexpired();
        $wypozyczenie->BookBorrow();
        echo("").PHP_EOL;
    }



    if($wybór==3){
        $user=new Students(2,"123","DArek@gmail.com",true,0,5);
        $book=new Books("W Pustyni i w puszczy","Henryk Sienkiewicz",12312312,"Książkix",2137,true);
        echo("").PHP_EOL;
        $rezerwacja=null;
        if($rezerwacja==null){
            echo("Nie dokonano rezerwacji").PHP_EOL;
        }
        else{
        $wypozyczenie=new Book_Borrow($user,$bibliotekarz,$rezerwacja,$date1);
        $wypozyczenie->BookBorrow();
        echo("").PHP_EOL;
        }
    }

}

if($scenariusz==4){
    do{
        echo("Wybierz rodzaj scenariusza: ").PHP_EOL;
        echo("Scenariusza główny - 1").PHP_EOL;
        echo("Scenariusza alternatywny ksiązka oddana po terminie - 2").PHP_EOL;
        $wybór=readline("Podaj numer scenariusza :");
    }
    while($wybór<1 || $wybór>2);
    if($wybór==1){
    
    $user=new Students(1,"123","jas@gmail.com",true,0,0);
    $book=new Books("Ania i jaś","ewa kwrac",12312312,"erere",1222,true);
    $bibliotekarz=new Librarian("Ryszard","ryszard420@gmail.com","500492666");


    echo("").PHP_EOL;
    $rezerwacja=new Book_Reservations($user,$book,$date1);
    $rezerwacja->BookReservationTEST();
    echo("").PHP_EOL;


    $wypozyczenie=new Book_Borrow($user,$bibliotekarz,$rezerwacja,$date2);
    $wypozyczenie->BookBorrowTEST();
    echo("").PHP_EOL;

    echo("").PHP_EOL;
  
    $oddanie=new Book_Return($wypozyczenie,$user,$bibliotekarz,$date3);
    $oddanie->ReturnBook();
    echo("").PHP_EOL;
    
    }

    if($wybór==2) {
    $user=new Students(1,"123","jas@gmail.com",true,0,0);
    $book=new Books("Ania i jaś","ewa kwrac",12312312,"erere",1222,true);
    $bibliotekarz=new Librarian("Ryszard","ryszard420@gmail.com","500492666");


    echo("").PHP_EOL;
    $rezerwacja=new Book_Reservations($user,$book,$date1);
    $rezerwacja->BookReservationTEST();
    echo("").PHP_EOL;



    $wypozyczenie=new Book_Borrow($user,$bibliotekarz,$rezerwacja,$date2);
    $wypozyczenie->BookBorrowTEST();
    echo("").PHP_EOL;

    echo("").PHP_EOL;
   
    $oddanie=new Book_Return($wypozyczenie,$user,$bibliotekarz,$date5);
    $oddanie->ReturnBook();
    echo("").PHP_EOL;
    


    }
}



?>