<?php


namespace awe;


class JsonUtility
{
    //creating the static function and passing the parameter
    public static function makeProductArray(string $file) {
        
        //reading the content of the file into string
        $string = file_get_contents($file);

        $productsJson = json_decode($string, true);

        //creating an empty array
        $products = [];

        //foreach statement that allow iterating over elements of an array
        foreach ($productsJson as $product) {
            switch($product['type']) {

                //code to be executed for cd
                case "cd":
                    $cdproduct = new \awe\CdProduct($product['id'],$product['title'], $product['firstname'],
                        $product['mainname'],$product['price'], $product['playlength']);
                    $products[] = $cdproduct;
                    break;

                //code to be executed for book
                case "book":
                    $bookproduct = new \awe\BookProduct($product['id'],$product['title'], $product['firstname'],
                        $product['mainname'],$product['price'], $product['numpages']);
                    $products[]=$bookproduct;
                    break;

                //code to be executed for game
                case "game":
                    $gameproduct = new \awe\GameProduct($product['id'],$product['title'], $product['firstname'],
                        $product['mainname'],$product['price'], $product['numPegi']);
                    $products[]=$gameproduct;
                    break;
            }
        }
        return $products;
    }

    //creating the static function and passing the parameter
    public static function deleteProductWithId(string $file, int $id) {

        //reading the content of the file into string
        $string = file_get_contents($file);

        $productsJson = json_decode($string, true);

        //creating an empty array
        $products = [];

        //foreach statement that allow iterating over elements of an array
        foreach ($productsJson as $product) {
            if($product['id'] != $id) {
                $products[] = $product;
            }
        }
        $json = json_encode($products);

        //searching for the files to write in
        file_put_contents($file, $json);
    }

    //creating the static function and passing the parameter
    public static function addNewProduct(string $file, string $producttype, string $fname, string $sname, string $title, int $pages, float $price)
    {
        //reading the content of the file into string
        $string = file_get_contents($file);

        $productsJson = json_decode($string, true);

        //creating an empty array
        $ids = [];
        foreach ($productsJson as $product) {
             $ids[] = $product['id'];
        }
        rsort($ids);
        $newId = $ids[0] + 1;

        $products = [];

        //foreach statement that allow iterating over elements of an array
        foreach ($productsJson as $product) {
            $products[] = $product;
        }

        //creating an empty array
        $newProduct = [];

        //storing id into variable
        $newProduct['id'] = $newId;

        //storing type into variable
        $newProduct['type'] = $producttype;

        //storing title into variable
        $newProduct['title'] = $title;

        //storing firstname into variable
        $newProduct['firstname'] = $fname;

        //storing mainname into variable
        $newProduct['mainname'] = $sname;

        //storing price into variable
        $newProduct['price'] = $price;

        //assigning playlength is the product type is cd
        if($producttype=='cd')   $newProduct['playlength'] = $pages;

        //assigning playlength is the product type is book
        if($producttype=='book') $newProduct['numpages'] = $pages;

        //assigning playlength is the product type is game
        if($producttype=='game') $newProduct['numPegi'] = $pages;

        $products[] = $newProduct;

        $json = json_encode($products);

        //searching for the files to write in
        file_put_contents($file, $json);
    }
}