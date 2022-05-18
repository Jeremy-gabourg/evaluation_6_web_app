<?php

class Country
{
    private int $id;
    private int $countryCode;
    private string $alpha2Code;
    private string $alpha3Code;
    private string $englishName;
    private string $frenchName;
    private int $safeHouseId;

    public function __construct(int $id, int $countryCode, string $alpha2Code, string $alpha3Code, string $englishName, string $frenchName, int $safeHouseId)
    {
        $this->id = $id;
        $this->countryCode = $countryCode;
        $this->alpha2Code = $alpha2Code;
        $this->alpha3Code = $alpha3Code;
        $this->englishName = $englishName;
        $this->frenchName = $frenchName;
        $this->safeHouseId = $safeHouseId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCountryCode(): int
    {
        return $this->countryCode;
    }

    public function setCountryCode(int $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getAlpha2Code(): string
    {
        return $this->alpha2Code;
    }

    public function setAlpha2Code(string $alpha2Code): void
    {
        $this->alpha2Code = $alpha2Code;
    }

    public function getAlpha3Code(): string
    {
        return $this->alpha3Code;
    }

    public function setAlpha3Code(string $alpha3Code): void
    {
        $this->alpha3Code = $alpha3Code;
    }

    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    public function setEnglishName(string $englishName): void
    {
        $this->englishName = $englishName;
    }

    public function getFrenchName(): string
    {
        return $this->frenchName;
    }

    public function setFrenchName(string $frenchName): void
    {
        $this->frenchName = $frenchName;
    }

    public function getSafeHouseId(): int
    {
        return $this->safeHouseId;
    }

    public function setSafeHouseId(int $safeHouseId): void
    {
        $this->safeHouseId = $safeHouseId;
    }


}