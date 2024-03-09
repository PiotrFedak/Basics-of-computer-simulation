<?php 


namespace PHP\Classes;

abstract class Volume {

   private string $title;
   private string $author;
   private int $ISBN;
   private string $publisher;
   private int $publication_year;
   private bool $status;


   function __construct(string $title,string $author, int $ISBN, string $publisher, int $publication_year, bool $status) {

    $this ->title=$title;
    $this ->author=$author;
    $this ->ISBN=$ISBN;
    $this ->publisher=$publisher;
    $this ->publication_year=$publication_year;
    $this ->status=$status;
   }

   public function GetTitle() {
    return $this->title;
    }

    public function GetStatus() {
        return  $this->status;
    }

    public function GetISBN() {
        return $this->ISBN;
    }

    public function GetAuthor() {
        return $this->author;
    }


    public function SetStatus($status) {
            $this ->status = $status;
    }

}

?>