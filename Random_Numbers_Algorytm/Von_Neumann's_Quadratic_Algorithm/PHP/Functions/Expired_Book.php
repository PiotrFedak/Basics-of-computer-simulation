<?php 

namespace PHP\Functions;

use PHP\Classes\Users;

final class Expired_Book {
    private Users $user;
    private int $days;
    const Penautli = 2;
    
    
    public function __construct(Users $u,int $d){
        $this->user=$u;
        $this->days=$d;
    }
    
    public function ReturnExpiredBook(){
        $user_id=$this->user->GetUserId();
        $kara=$this::Penautli*$this->days;
        $this->user->Setpenalty_counter($kara);
        $this->user->SetVolumeCounter(-1);
        echo("Naliczono kare w wyskości ".$kara." dla użytkownika ".$user_id ." za odddanie ksiązki ".$this->days." dni po terminie").PHP_EOL;
    }
        
    
}

    

?>