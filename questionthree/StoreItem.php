<?php

class StoreItem
{
    /**
     * @var array [length, width, height] in *unit of measure here*.
     */
    private $dimensions;

    private $id;
    private $name;
    private $price; // Assuming dollars for this assessment
    private $stockQty;

    /**
     * @var float In *unit of measure here*.
     */
    private $weight;

    /**
     * StoreItem constructor.
     * @param int $id
     * @param string $name
     * @param float $weight
     * @param array $dimensions
     * @param int $stockQty
     * @param float $price
     */
    public function __construct(
        int $id,
        string $name,
        float $weight,
        array $dimensions,
        int $stockQty,
        float $price
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
        $this->stockQty = $stockQty;
        $this->price = $price;
    }

    /**
     * @return array
     */
    public function getDimensions(): array
    {
        return $this->dimensions;
    }

    /**
     * @param array $dimensions
     */
    public function setDimensions(array $dimensions): void
    {
        $this->dimensions = $dimensions;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getStockQty(): int
    {
        return $this->stockQty;
    }

    /**
     * @param int $stockQty
     */
    public function setStockQty(int $stockQty): void
    {
        $this->stockQty = $stockQty;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }
}
