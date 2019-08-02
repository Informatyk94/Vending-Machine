<?php
include("machine.php");
class main{
    public function __construct(){
        $machine = new machine();
        $machine->addMoney(0);
        // $machine->addMoney(1);
        // $machine->addMoney(1);
        // $machine->addMoney(1);

        // $machine->viewCash();
       

        $machine->deleteItemServis(1);
        // $machine->buyItem(4);
    }
}
$start = new main();
?>