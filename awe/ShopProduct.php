<?php


namespace awe;


class ShopProduct
{
    //declaring private variables
    private $id;
    private $title;
    private $mainName;
    private $firstName;

    //declaring protected variable
    protected $price;

    //calling the constructor and passing the parameters
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price
    )
    {
        //keyword references the current object of the class
        $this->id = $id;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->mainName = $mainName;
        $this->price = $price;
    }

    //public function to get id (getter method)
    public function getId()
    {
        //this returns the object
        return $this->id;
    }

    //public function to get FirstName (getter method)
    public function getFirstName()
    {
        //this returns the object
        return $this->firstName;
    }

    //public function to get MainName (getter method)
    public function getMainName()
    {
        //this returns the object
        return $this->mainName;
    }

    //public function to get Title(getter method)
    public function getTitle()
    {
        //this returns the object
        return $this->title;
    }

    //public function to get Price (getter method)
    public function getPrice()
    {
        //this returns the object
        return ($this->price);
    }

    //public function to get FullName (getter method)
    public function getFullName()
    {
        //this returns the object
        return $this->firstName . " " . $this->mainName;
    }
}