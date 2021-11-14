<?php


namespace awe;

//HtmlProductWriter class using properties of other ShopProductWriter class with the extends keyword
class HtmlProductWriter extends ShopProductWriter
{

    public function write()
    {
        echo $this->htmlHeader();
        echo $this->htmlBody();
        echo '</html>';
    }

    private function htmlHeader()
    {
        return
            '<!DOCTYPE html>
            <html>
            <head>
                <title>AWE Product List</title>
                <link rel="stylesheet" href="./css/styles.css">
            </head>';
    }

    private function htmlBody()
    {
        //Declaring an array attributes called bookproducts,cdproducts,gameproducts for book,cd and game respectively
        $bookproducts = [];
        $cdproducts = [];
        $gameproducts = [];

        //foreach loop for displaying array elements
        foreach ($this->products as $product) {

        //instance of operator used for controlling objects for book,cd and game respectively
         if($product instanceof BookProduct) $bookproducts[] = $product;
         if($product instanceof CdProduct) $cdproducts[] = $product;
         if($product instanceof GameProduct) $gameproducts[]=$product;
        }

        //calling function for all three table:book cd and game
        $booktable = $this->generateBookTable($bookproducts);
        $cdtable = $this->generateCdTable($cdproducts);
        $gametable =$this->generateGameTable($gameproducts);

        //calling function for adding new product
        $addProduct = $this->generateAddProductForm();

        return
            '<body>'
            . $booktable .//returns the objects of booktable
            '<br />'
            .$cdtable.//returns the objects of cdtable
            '<br />'
            .$gametable.//returns the objects of gametable
            '<br />'
            .$addProduct .//returns the objects of added product
            '</body>';
    }

    //generating table for books
    private function generateBookTable($bookproducts)
    {
        $contents = '';
        foreach ($bookproducts as $book) {

            //calling get function to assign the value on variable and storing it in the new variable called $contents
            $contents .= '<tr>
                  <td>'.$book->getFullName().'</td>'
                .'<td>'.$book->getTitle().'</td>'
                .'<td>'.$book->getNumberOfPages().'</td>'
                .'<td>'.$book->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$book->getId().'">X</a>'.'</td>
                </tr>';
        }
        return

        /*creating table
        creating tablehead
        */
            '
            <h3>BOOKS</h3>
            <table class="paleBlueRows equal-width">
                <thead>
                    <tr>
                        <th>AUTHOR</th>
                        <th>TITLE</th>
                        <th>PAGES</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.//displaying the content of the table
                '</tbody>
            </table>';
    }

     //generating table for cds 
    private function generateCdTable($cdproducts)
    {
        $contents = '';
        foreach ($cdproducts as $cd) {

            //calling get function to assign the value on variable and storing it in the new variable called $contents
            $contents .= '<tr>
                  <td>'.$cd->getFullName().'</td>'
                .'<td>'.$cd->getTitle().'</td>'
                .'<td>'.$cd->getPlayLength().'</td>'
                .'<td>'.$cd->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$cd->getId().'">X</a>'.'</td>
                </tr>';
        }
        return

        /*creating table
        creating tablehead
        */
            '
            <h3>CDs</h3>
            <table class="paleBlueRows equal-width">
                 <thead>
                    <tr>                    
                        <th>ARTIST</th>
                        <th>TITLE</th>
                        <th>DURATION</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.//displaying the content of the table
            '</tbody>
            </table>';
    }
         //generating table for games 
      private function generateGameTable($gameproducts)
    {
        $contents = '';
        foreach ($gameproducts as $game) {

            //calling get function to assign the value on variable and storing it in the new variable called $contents
            $contents .= '<tr>
                  <td>'.$game->getFullName().'</td>'
                .'<td>'.$game->getTitle().'</td>'
                .'<td>'.$game->getNumberOfPegi().'</td>'
                .'<td>'.$game->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$game->getId().'">X</a>'.'</td>
                </tr>';
        }
        return

        /*creating table
        creating tablehead
        */
            '
            <h3>GAMES</h3>
            <table class="paleBlueRows equal-width">
                 <thead>
                    <tr>                    
                        <th>CONSOLE</th>
                        <th>TITLE</th>
                        <th>PEGI</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.//displaying the content of the table
            '</tbody>
            </table>';
    }


    private function generateAddProductForm()
    {
        //creating form to add new product
        return '
          <hr />

          <h2>ADD NEW PRODUCT</h2>
         <form action="./index.php" method="post">
          <label for="producttype">Product Type:</label>
          <select id="producttype" name="producttype">
                <option value="cd">CD</option>
                <option value="book">Book</option>
                <option value="game">Game</option>
          </select> 
          <br />
          <br />
         <label for="name">Author / Artist</label><br />
         <label for="fname">First Name:</label>
           <input type="text" id="fname" name="fname"><br><br>
          <label for="sname">Main Name/Surname/Console:</label>
           <input type="text" id="sname" name="sname">
           <br />
           <br />
         <label for="title">Title:</label>
           <input type="text" id="title" name="title">
           <br />
           <br />
         <label for="pages">Pages/Duration/Pegi:</label>
           <input type="text" id="pages" name="pages">
           <br />
           <br />
          <label for="price">Price:</label>
           <input type="text" id="price" name="price">
           <br />
           <br /> 
           <button type="submit">Submit</button>
        </form> 
          
        ';
    }
}