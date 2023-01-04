<?php

class SafeHouse
{
    private int $id;
    private string $address;
    private string $safeHouseType;
    private bool $isAvailable;
    private int $countryId;
    private int $missionId;

    public function __construct(int $id, string $address, string $safeHouseType, bool $isAvailable, int $countryId, int $missionId)
    {
        $this->id = $id;
        $this->address = $address;
        $this->safeHouseType = $safeHouseType;
        $this->isAvailable = $isAvailable;
        $this->countryId = $countryId;
        $this->missionId = $missionId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getSafeHouseType(): string
    {
        return $this->safeHouseType;
    }

    public function setSafeHouseType(string $safeHouseType): void
    {
        $this->safeHouseType = $safeHouseType;
    }

    public function isAvailable(): bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): void
    {
        $this->isAvailable = $isAvailable;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getMissionId(): int
    {
        return $this->missionId;
    }

    public function setMissionId(int $missionId): void
    {
        $this->missionId = $missionId;
    }


}