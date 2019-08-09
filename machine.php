<?php
class machine{
    private $typeOfMoneyAndState = [
        ["id"=> 0, "name" => "dollar" , "value" => 1,   "quantity" => 0],
        ["id"=> 1, "name" => "quarter" ,"value" => 0.25,"quantity" => 20],
        ["id"=> 2, "name" => "dime" ,   "value" => 0.1,"quantity" => 20],
        ["id"=> 3, "name" => "nickiel" ,"value" => 0.05,"quantity" => 20],
    ];

    //budget for the purchase of the item
    private $cash = 0;

    //item list
    private $items = ["item0" => 0.65,     
                      "item1" => 1, 
                      "item2" => 1.5];


    //function add money
    public function addMoney($i){
        foreach($this->typeOfMoneyAndState as &$type){
            if($type["id"] == $i){
                $type["quantity"] = $type["quantity"] + 1;
                $this->update($type["value"]);
            }
        }    
    }

    private function update($i){
        $this->cash = $this->cash + $i;
    }

    public function viewCash(){
        echo $this->cash . " ";
    } 

    public function buyItem($i){
        if($this->cash >= $this->items['item'.$i]){
            echo "You bought the item <br />";
            $this->cash = $this->cash - $this->items['item'.$i];
            echo "return money <br />";
        }else{
            echo "More money <br />";
        }
    
    }

    public function returnMoney(){
        $returnCash = $this->cash;
        foreach($this->typeOfMoneyAndState as $type){
            //sprawdza ile bedzie do wydanai z określonego bilonu
            $howMuchMoneyOfThisType = floor($returnCash / $type["value"] + 0.004);            
            if($howMuchMoneyOfThisType <= $type["quantity"]){
                $returnCash = $returnCash - $howMuchMoneyOfThisType * $type["value"];
                $type["quantity"] = $type["quantity"] - $howMuchMoneyOfThisType;  
                echo $howMuchMoneyOfThisType . " x " . $type["name"] . "  <br />";
            }elseif($type["quantity"] < $howMuchMoneyOfThisType && $type["quantity"] > 0 ){
                //how much can you give away coins
                $cacheCash = $howMuchMoneyOfThisType - $type["quantity"];
                $returnCash = $returnCash - $cacheCash * $type["value"];
                $type["quantity"] = $type["quantity"] - $cacheCash * $type["value"];  
                echo $cacheCash . " x " . $type["name"]  . " <br /> ";
            }
        }
    }

    public function addMoneyServis($i){
        foreach($this->typeOfMoneyAndState as &$type){
            if($type["id"] == $i){
                $type["quantity"] = $type["quantity"] + 1;
            }
        }
    }

    public function deleteMoneyServis($i){
        foreach($this->typeOfMoneyAndState as &$type){
            if($type["id"] == $i){
                if($type["quantity"] > 0){
                    $type["quantity"] = $type["quantity"] - 1;
                }else{
                    echo "<br />
                        no coin
                    <br />";
                } 
            }
        }
    }

    public function addOrChangeItemServis($i, $j){
        $name = "item".$i;
        $this->items[$name] = $j;
    }

    public function deleteItemServis($i){
        $name = "item".$i;
        
        if(in_array($name,  array_keys($this->items), true)){
            unset($this->items[$name]);
            echo "
            <br /> 
                Delete item ". $name ."
            <br />";
        }else{
            echo "
            <br /> 
                There is no item
            <br />";
        }
    }

    public function stateView(){
        var_dump($this->items);
        echo "<br />";
        print_r($this->typeOfMoneyAndState);
    }
}