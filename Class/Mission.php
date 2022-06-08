<?php

class Mission
{
    private int $id;
    private string $title;
    private string $description;
    private string $codeName;
    private int $startDate;
    private int $endDate;
    private int $countryId;
    private int $typeId;
    private int $statusId;
    private int $specialityId;

    public function __construct(int $id, string $title, string $description, string $codeName, int $startDate, int $endDate, int $countryId, int $typeId, int $statusId, int $specialityId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->codeName = $codeName;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->countryId = $countryId;
        $this->typeId = $typeId;
        $this->statusId = $statusId;
        $this->specialityId = $specialityId;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getCodeName(): string
    {
        return $this->codeName;
    }

    public function setCodeName(string $codeName): void
    {
        $this->codeName = $codeName;
    }

    public function getStartDate(): int
    {
        return $this->startDate;
    }

    public function setStartDate(int $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): int
    {
        return $this->endDate;
    }

    public function setEndDate(int $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

    public function setStatusId(int $statusId): void
    {
        $this->statusId = $statusId;
    }

    public function getSpecialityId(): int
    {
        return $this->specialityId;
    }

    public function setSpecialityId(int $specialityId): void
    {
        $this->specialityId = $specialityId;
    }

}