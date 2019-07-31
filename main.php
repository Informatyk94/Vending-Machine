<?php
include("machine.php");

class main{
public function __construct(){
    $machine = new machine();
    $machine->addMoney(0);
}   

}


$start = new main();
?>
