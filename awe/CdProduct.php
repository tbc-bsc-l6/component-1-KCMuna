<?php


namespace awe;


//CdProduct class using properties of other ShopProduct class with the extends keyword
class CdProduct extends ShopProduct
{
    //declaration of private variable
    private $playLength;

    
        //function built and called for every new product we create
        public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength
    )
    {
        parent::__construct(//Constructor element object created by function
            $id,
            $title,
            $firstName,
            $mainName,
            $price
        );
           //data assigning to the variable from inside the method
        $this->playLength = $playLength;
    }

   //function called for returning number of pages
    public function getPlayLength()
    {
        return $this->playLength;//keywords returns the length
    }
}