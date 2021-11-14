<?php


namespace awe;


abstract class ShopProductWriter
{
    /*
    *Declare an array products as protected
    *add the product including method
    *implement the set() method thst adds any property to the array
    */
    protected $products = [];
    public function addProduct(ShopProduct $shopProduct)
    {
        //this returns the object
        $this->products[] = $shopProduct;
    }

    //setter method
    public function setProducts($products){
        
        //this returns the object
        $this->products=$products;
    }

    abstract public function write();

}