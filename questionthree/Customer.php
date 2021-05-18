<?php

class Customer
{
    const ADDRESS_KEYS = ['address_1', 'address_2', 'city', 'state', 'zip'];

    private $addresses;
    private $firstName;
    private $lastName;

    /**
     * Customer constructor.
     * @param string $firstName
     * @param string $lastName
     * @param array $addresses
     */
    public function __construct(
        string $firstName,
        string $lastName,
        array $addresses = []
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->addresses = $addresses;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return array
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param array $addresses
     */
    public function setAddresses(array $addresses): void
    {
        $this->addresses = [];

        foreach ($addresses as $addr) {
            $this->addAddress($addr);
        }
    }

    /**
     * @param array $address
     */
    public function addAddress(array $address): void
    {
        if (array_keys($address) == self::ADDRESS_KEYS) {
            $this->addresses[] = $address;
        } else {
            throw new InvalidArgumentException('Invalid address structure.');
        }
    }
}
