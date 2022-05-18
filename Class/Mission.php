<?php

class Mission
{
    private int $id;
    private string $title;
    private string $description;
    private string $codeName;
    private int $stardDate;
    private int $endDate;
    private int $countryId;
    private int $typeId;
    private int $statusId;
    private int $safeHouseId;
    private int $specialityId;
    private string $targetId;
    private string $contactId;
    private string $agentId;

    public function __construct(int $id, string $title, string $description, string $codeName, int $stardDate, int $endDate, int $countryId, int $typeId, int $statusId, int $safeHouseId, int $specialityId, string $targetId, string $contactId, string $agentId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->codeName = $codeName;
        $this->stardDate = $stardDate;
        $this->endDate = $endDate;
        $this->countryId = $countryId;
        $this->typeId = $typeId;
        $this->statusId = $statusId;
        $this->safeHouseId = $safeHouseId;
        $this->specialityId = $specialityId;
        $this->targetId = $targetId;
        $this->contactId = $contactId;
        $this->agentId = $agentId;
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

    public function getStardDate(): int
    {
        return $this->stardDate;
    }

    public function setStardDate(int $stardDate): void
    {
        $this->stardDate = $stardDate;
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

    public function getSafeHouseId(): int
    {
        return $this->safeHouseId;
    }

    public function setSafeHouseId(int $safeHouseId): void
    {
        $this->safeHouseId = $safeHouseId;
    }

    public function getSpecialityId(): int
    {
        return $this->specialityId;
    }

    public function setSpecialityId(int $specialityId): void
    {
        $this->specialityId = $specialityId;
    }

    public function getTargetId(): string
    {
        return $this->targetId;
    }

    public function setTargetId(string $targetId): void
    {
        $this->targetId = $targetId;
    }

    public function getContactId(): string
    {
        return $this->contactId;
    }

    public function setContactId(string $contactId): void
    {
        $this->contactId = $contactId;
    }

    public function getAgentId(): string
    {
        return $this->agentId;
    }

    public function setAgentId(string $agentId): void
    {
        $this->agentId = $agentId;
    }


}