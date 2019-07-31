<?php
class machine{
    private $nickiel = 0;
    private $dime = 0;
    private $quarter = 0;
    private $dollar = 0;

    public $cash = 0;

    public function addMoney($i){
        switch ($i) {
            case 0:
                $this->$nickiel;
                break;
            case 1:
                $this->$dime++;
                break;
            case 2:
                $this->$quarter++;
                break;
            case 3:
                $this->$dollar++;
        }
        $this->update();
    }

    private function update(){
        $this->cash = $this->$nickiel * 0.05 + $this->$dime * 0.10 + $this->$quarter * 0.25 + $this->$dollar * 1;
    }

    public function viewCash(){
        $sad = $this->$cash;
    } 

}