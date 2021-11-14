<?php


namespace awe;

//BookProduct class using properties of other ShopProduct class with the extends keyword
class BookProduct extends ShopProduct 
{
    //declaration of private variable
    private $numPages;

    //function built and called for every new product we create
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
    )
    {

        parent::__construct( //Constructor element object created by function
            $id,
            $title,
            $firstName,
            $mainName,
            $price
        );

        //data assigning to the variable from inside the method
        $this->numPages = $numPages;
    }

   //function called for returning number of pages
    public function getNumberOfPages()
    {
        return $this->numPages;// keywords returns the length
    }
}
