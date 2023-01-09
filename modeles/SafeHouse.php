<?php

class SafeHouse
{
    private int $id;
    private string $address;
    private string $type;
    private bool $is_available;
    private int $mission;
    private int $country;

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
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isIsAvailable(): bool
    {
        return $this->is_available;
    }

    /**
     * @param bool $is_available
     */
    public function setIsAvailable(bool $is_available): void
    {
        $this->is_available = $is_available;
    }

    /**
     * @return int
     */
    public function getMission(): int
    {
        return $this->mission;
    }

    /**
     * @param int $mission
     */
    public function setMission(int $mission): void
    {
        $this->mission = $mission;
    }

    /**
     * @return int
     */
    public function getCountry(): int
    {
        return $this->country;
    }

    /**
     * @param int $country
     */
    public function setCountry(int $country): void
    {
        $this->country = $country;
    }


}