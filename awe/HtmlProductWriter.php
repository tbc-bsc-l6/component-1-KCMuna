<?php


namespace awe;


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
        $bookproducts = [];
        $cdproducts = [];
        $gameproducts = [];

        foreach ($this->products as $product) {
         if($product instanceof BookProduct) $bookproducts[] = $product;
         if($product instanceof CdProduct) $cdproducts[] = $product;
         if($product instanceof GameProduct) $gameproducts[]=$product;
        }

        $booktable = $this->generateBookTable($bookproducts);
        $cdtable = $this->generateCdTable($cdproducts);
        $gametable =$this->generateAddProductForm($gameproducts);

        $addProduct = $this->generateAddProductForm();

        return
            '<body>'
            . $booktable .
            '<br />'
            .$cdtable.
            '<br />'
            .$gametable.
            '<br />'
            .$addProduct .
            '</body>';
    }

    private function generateBookTable($bookproducts)
    {
        $contents = '';
        foreach ($bookproducts as $book) {
            $contents .= '<tr>
                  <td>'.$book->getFullName().'</td>'
                .'<td>'.$book->getTitle().'</td>'
                .'<td>'.$book->getNumberOfPages().'</td>'
                .'<td>'.$book->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$book->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
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
            .$contents.
                '</tbody>
            </table>';
    }

    private function generateCdTable($cdproducts)
    {
        $contents = '';
        foreach ($cdproducts as $cd) {
            $contents .= '<tr>
                  <td>'.$cd->getFullName().'</td>'
                .'<td>'.$cd->getTitle().'</td>'
                .'<td>'.$cd->getPlayLength().'</td>'
                .'<td>'.$cd->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$cd->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
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
            .$contents.
            '</tbody>
            </table>';
    }

      private function generateGameTable($gameproducts)
    {
        $contents = '';
        foreach ($gameproducts as $game) {
            $contents .= '<tr>
                  <td>'.$game->getFullName().'</td>'
                .'<td>'.$game->getTitle().'</td>'
                .'<td>'.$game->getNumberOfPegi().'</td>'
                .'<td>'.$game->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$game->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
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
            .$contents.
            '</tbody>
            </table>';
    }


    private function generateAddProductForm()
    {
        return '
          <hr />
          <h2 style=" background:#dedede; width:500px; padding:20px;margin-left:500px; border-radius:10px; text-align:center;">ADD NEW PRODUCT</h2>
         <form action="./index.php" method="post" style="background:#e8e6e6; width:500px; padding:20px; margin-left:500px;border-radius:10px;">
                <label for="producttype">Product Type:</label>
                <select id="producttype" name="producttype">
                <option value="cd">CD</option>
                <option value="book">Book</option>
                <option value="game">Game</option>
                </select><br><br> 

                <label for="name">Author / Artist</label><br>
                <label for="fname">First Name:</label>
                <input style="margin-left:223px;"type="text" id="fname" name="fname"><br><br>
                <label for="sname">Main Name/Surname/Console:</label>
                <input style="margin-left:100px;"type="text" id="sname" name="sname"><br><br>

                <label for="title">Title:</label>
                <input style="margin-left:265px;"type="text" id="title" name="title"><br><br>

                <label  for="pages">Pages / Duration / PEGI:</label>
                <input style="margin-left:140px;" type="text" id="pages" name="pages"><br><br>

                <label for="price">Price:</label>
                <input style="margin-left:262px;"type="text" id="price" name="price"><br><br>
                <input style="margin-left:220px; background:#D0E4F5;" type="submit" value="Submit">

        </form> 
        ';
    }
}