<?php
include("machine.php");
class main{
    public function __construct(){
        $this->start();
    }
    public function start(){
        $machine = new machine();
        // $machine->addMoney(1);
        // $machine->addMoney(1);
        // $machine->addMoney(1);
        // $machine->addMoney(1);
        // $machine->buyItem(1);
        // $machine->returnMoney();

        // $machine->addMoney(1);
        // $machine->addMoney(1);
        // $machine->returnMoney();


        // $machine->addMoney(0);
        // $machine->buyItem(0);
        // $machine->returnMoney();

        // $machine->viewCash();
        // $machine->deleteItemServis(1);
        // $machine->buyItem(0);

        // $machine->stateView();
        // $machine->deleteMoneyServis(0);
        // $machine->stateView();
        // $machine->stateCoin();
    }
}
$start = new main();
?>