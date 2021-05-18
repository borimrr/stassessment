<?php

class ShoppingCart
{
    private $customer;
    private $items;
    private $shippingAddress;

    const TAX_RATE = 0.07;

    /**
     * ShoppingCart constructor.
     * @param Customer $customer
     * @param array $items
     */
    public function __construct(Customer $customer, array $items = [])
    {
        $this->customer = $customer;
        $this->items = $items;
        $this->shippingAddress = $customer->getAddresses()[0] ?? [];
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     */
    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return array
     */
    public function getShippingAddress(): array
    {
        return $this->shippingAddress;
    }

    /**
     * @param array $shippingAddress
     */
    public function setShippingAddress(array $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @param StoreItem $item
     */
    public function addItem(StoreItem $item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return float
     */
    public function getSubTotal(): float
    {
        $subTotal = 0;

        foreach ($this->items as $item) {
            $subTotal += $item->getPrice();
        }

        return $subTotal;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return ($this->getSubTotal() * (1 + self::TAX_RATE))
            + $this->getCartShippingRate();
    }

    /**
     * @param int $id
     * @return float
     */
    public function getTotalForItem(int $id): float
    {
        foreach ($this->items as $item)
        {
            if ($item->getId() === $id) {
                return ($item->getPrice() * (1 + self::TAX_RATE))
                    + $this->getItemShippingRate($item);
            }
        }

        throw new InvalidArgumentException(
            sprintf('Item with ID: %s does not exist in cart.', $id)
        );
    }

    /**
     * @return float
     */
    private function getCartShippingRate(): float
    {
        $cartShippingRate = 0;

        // Assuming no discount for bulk shipping
        foreach ($this->items as $item) {
            $cartShippingRate += $this->getItemShippingRate($item);
        }

        return $cartShippingRate;
    }

    /**
     * @param StoreItem $item
     * @return float
     */
    private function getItemShippingRate(StoreItem $item): float
    {
        /*
         * Assuming something like:
         *
         * return ShippingRateService::getRate(
         *     $this->shippingAddress['zip'],
         *     $item->getWeight(),
         *     $item->getDimensions()
         * );
         */

        return 5.00;
    }
}
