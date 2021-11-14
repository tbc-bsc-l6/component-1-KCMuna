<?php


namespace awe;


class JsonProductWriter extends ShopProductWriter
{
    public function write()
    {
        $json_str = '[';
        foreach ($this->products as $product) {
          $json_str .= $this->addEachProductAsJSON($product).',';
        }
        $json_str = rtrim($json_str, ","); //remove final ',' from outputted json string

        $json_str .= "]";
        echo $json_str;
    }

    //creating private function
    private function addEachProductAsJSON($product){
        $json_product = [];
        $json_product['id'] = $product->getId();//getting product id
        $json_product['title'] = $product->getTitle();//getting product title
        $json_product['firstname'] = $product->getFirstName();//getting product firstname
        $json_product['mainname'] = $product->getMainName();//getting product main name
        $json_product['price'] = $product->getPrice();//getting product price


        //check if $Product belongs to the BookProduct class
        if($product instanceof BookProduct) {

            //get the NumberOfPages function
            $json_product['numpages'] = $product->getNumberOfPages();

            //assigning specific type
            $json_product['type'] = "book";
        }

        //check if $Product belongs to the CDProduct class
        if($product instanceof CDProduct) {

            //get the PlayLength function
            $json_product['playlength'] = $product->getPlayLength();
            
            //assigning specific type
            $json_product['type'] = "cd";
        }

        //check if $Product belongs to the GameProduct class
        if($product instanceof GameProduct) {

            //get the NumberOfPegi function
            $json_product['numPegi'] = $product->getNumberOfPegi();
            
            //assigning specific type
            $json_product['type'] = "game";
        }

        return json_encode($json_product);
    }
}