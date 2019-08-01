<?php
include("machine.php");

class main{
public function __construct(){
    $machine = new machine();
    $machine->addMoney(3);
    $machine->addMoney(3);
    $machine->addMoney(2);
    $machine->addMoney(2);
    $machine->addMoney(1);
    $machine->addMoney(1);
    $machine->addMoney(0);
    $machine->addMoney(0);
    $machine->addMoney(0); 
    $machine->addMoney(0);
    $machine->viewCash();
    $machine->buyItem(0);
    $machine->returnMoney();
   

}   

}


$start = new main();
?>
