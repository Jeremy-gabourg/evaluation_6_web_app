<?php

class Country
{
    private int $id;
    private int $country_code;
    private string $alpha2_code;
    private string $alpha3_code;
    private string $english_name;
    private string $french_name;

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
     * @return int
     */
    public function getCountryCode(): int
    {
        return $this->country_code;
    }

    /**
     * @param int $country_code
     */
    public function setCountryCode(int $country_code): void
    {
        $this->country_code = $country_code;
    }

    /**
     * @return string
     */
    public function getAlpha2Code(): string
    {
        return $this->alpha2_code;
    }

    /**
     * @param string $alpha2_code
     */
    public function setAlpha2Code(string $alpha2_code): void
    {
        $this->alpha2_code = $alpha2_code;
    }

    /**
     * @return string
     */
    public function getAlpha3Code(): string
    {
        return $this->alpha3_code;
    }

    /**
     * @param string $alpha3_code
     */
    public function setAlpha3Code(string $alpha3_code): void
    {
        $this->alpha3_code = $alpha3_code;
    }

    /**
     * @return string
     */
    public function getEnglishName(): string
    {
        return $this->english_name;
    }

    /**
     * @param string $english_name
     */
    public function setEnglishName(string $english_name): void
    {
        $this->english_name = $english_name;
    }

    /**
     * @return string
     */
    public function getFrenchName(): string
    {
        return $this->french_name;
    }

    /**
     * @param string $french_name
     */
    public function setFrenchName(string $french_name): void
    {
        $this->french_name = $french_name;
    }


}