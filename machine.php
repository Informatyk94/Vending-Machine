<?php
class machine{
    //condition of coins thrown
    private $nickiel = 20;
    private $dime = 20;
    private $quarter = 1;
    private $dollar =-1;

    //budget for the purchase of the item
    private $cash = 0;

    //item list
    private $items = ["item0" => 0.65 , "item1" => 1, "item2" => 1.5];


    //function add money
    public function addMoney($i){
        switch ($i) {
            case 0:
                $this->nickiel++;
                $this->update(0.05);
                break;
            case 1:
                $this->dime++;
                $this->update(0.10);
                break;
            case 2:
                $this->quarter++;
                $this->update(0.25);
                break;
            case 3:
                $this->dollar++;
                $this->update(1.00);
        }
    }

    private function update($i){
        $this->cash = $this->cash + $i;
    }

    public function viewCash(){
      echo $this->cash;
    } 

    public function buyItem($i){
        if($this->cash > $this->items['item'.$i]){
            echo "You bought the item";
            $this->cash = $this->cash - $this->items['item'.$i];
            echo "return money";
        }else{
            echo "More money";
        }
    
    }

    public function returnMoney(){
        $returnCash = $this->cash;

        $dollar = floor($returnCash / 1);
        if($dollar <= $this->dollar){
            $returnCash = $returnCash - $dollar;
            $this->dollar = $this->dollar - $dollar;  
            echo $dollar . " x dollar";
        }elseif($this->dollar < $dollar && $this->dollar > 0 ){
            //how much can you give away coins
            $cacheCash = $dollar - $this->dollar;
            $returnCash = $returnCash - $cacheCash;
            $this->dollar = $this->dollar - $cacheCash;  
            echo $cacheCash . " x dollar";
        }

        $quarter = floor($returnCash / 0.25);
        if($quarter <= $this->quarter){
            $returnCash = $returnCash - $quarter * 0.25;
            $this->quarter = $this->quarter - $quarter;
            echo $quarter . " x quarter";
        }elseif($this->quarter < $quarter && $this->quarter > 0 ){
            //how much can you give away coins
            $cacheCash = $quarter - $this->quarter;
            $returnCash = $returnCash - $cacheCash*0.25;
            $this->quarter = $this->quarter - $cacheCash;  
            echo $cacheCash . " x quarter";
        }
        
        
    }

}