<?php
class machine{
    //condition of coins thrown
    private $nickiel = 20;
    private $dime = 20;
    private $quarter = 20;
    private $dollar =20;

    private $typeOfMoneyAndState = [
        ["id"=> 0, "name" => "dollar" , "value" => 1,   "quantity" => 20],
        ["id"=> 1, "name" => "quarter" ,"value" => 0.25,"quantity" => 20],
        ["id"=> 2, "name" => "dime" ,   "value" => 0.10,"quantity" => 20],
        ["id"=> 3, "name" => "nickiel" ,"value" => 0.05,"quantity" => 20],
    ];

    //budget for the purchase of the item
    private $cash = 0;

    //item list
    private $items = ["item0" => 0.65 , "item1" => 1, "item2" => 1.5];


    //function add money
    public function addMoney($i){
        $typeOfMoneyAndState = $this->typeOfMoneyAndState;
        $tab = array();
        foreach($typeOfMoneyAndState as $type){
            if($type["id"] == $i){
                $type["quantity"] = $type["quantity"] + 1;
            }
            
        }
    

        $this->typeOfMoneyAndState = $tab;
          
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
        foreach($this->typeOfMoneyAndState as $type){
            //sprawdza ile bedzie do wydanai z określonego bilonu
            
            $howMuchMoneyOfThisType = floor($returnCash / $type["value"]);
            if($howMuchMoneyOfThisType <= $type["quantity"]){
                $returnCash = $returnCash - $howMuchMoneyOfThisType * $type["value"];
                $type["quantity"] = $type["quantity"] - $howMuchMoneyOfThisType;  
                echo $howMuchMoneyOfThisType . " x " . $type["name"] . "  ";
            }elseif($type["quantity"] < $howMuchMoneyOfThisType && $type["quantity"] > 0 ){
                //how much can you give away coins
                $cacheCash = $howMuchMoneyOfThisType - $type["quantity"];
                $returnCash = $returnCash - $cacheCash * $type["value"];
                $type["quantity"] = $type["quantity"] - $cacheCash * $type["value"];  
                echo $cacheCash . " x " . $type["name"]  . "  ";
            }
        }
    }
}