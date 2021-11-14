<?php


namespace awe;

//GameProduct class using properties of other ShopProduct class with the extends keyword
class GameProduct extends ShopProduct
{
    //declaration of private variable
    private $numPegi;

    //function built and called for every new product we create
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPegi
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
        $this->numPegi = $numPegi;
    }

    //function called for returning number of pages
    public function getNumberOfPegi()
    {
        return $this->numPegi;//keywords returns the length
    }
}
