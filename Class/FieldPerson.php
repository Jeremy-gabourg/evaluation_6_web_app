<?php

class FieldPerson
{
    private int $id;
    private string $firstName;
    private string $lastName;
    private int $birthDate;
    private string $codeName;
    private int $statusId;
    private int $typeId;
    private int $countryId;
    private int $missionId;
    private array $agentSpecialities;

    /**
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param int $birthDate
     * @param string $codeName
     * @param int $statusId
     * @param int $typeId
     * @param int $countryId
     * @param int $missionId
     * @param array $agentSpecialities
     */
    public function __construct(int $id, string $firstName, string $lastName, int $birthDate, string $codeName, int $statusId, int $typeId, int $countryId, int $missionId, array $agentSpecialities)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->codeName = $codeName;
        $this->statusId = $statusId;
        $this->typeId = $typeId;
        $this->countryId = $countryId;
        $this->missionId = $missionId;
        $this->agentSpecialities = $agentSpecialities;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getBirthDate(): int
    {
        return $this->birthDate;
    }

    public function setBirthDate(int $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getCodeName(): string
    {
        return $this->codeName;
    }

    public function setCodeName(string $codeName): void
    {
        $this->codeName = $codeName;
    }

    public function getStatusId(): int
    {
        return $this->statusId;
    }

    public function setStatusId(int $statusId): void
    {
        $this->statusId = $statusId;
    }

    public function getTypeId(): int
    {
        return $this->typeId;
    }

    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
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

    public function getAgentSpecialities(): array
    {
        return $this->agentSpecialities;
    }

    public function setAgentSpecialities(array $agentSpecialities): void
    {
        $this->agentSpecialities = $agentSpecialities;
    }


}