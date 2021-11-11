<?php


namespace awe;


class GameProduct extends ShopProduct
{
    private $numPegi;

    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPegi
    )
    {

        parent::__construct(
            $id,
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->numPegi = $numPegi;
    }

    public function getNumberOfPegi()
    {
        return $this->numPegi;
    }
}
