<?php

require_once AgentSpeciality::class;

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
    private array $agentSpecialities;
    private int $mission;

    public function __construct(int $id, string $firstName, string $lastName, int $birthDate, string $codeName, int $statusId, int $typeId, int $countryId, array $agentSpecialities, int $mission)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->codeName = $codeName;
        $this->statusId = $statusId;
        $this->typeId = $typeId;
        $this->countryId = $countryId;
        $this->agentSpecialities = $agentSpecialities;
        $this->mission = $mission;
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

    public function getAgentSpecialities(): array
    {
        return $this->agentSpecialities;
    }

    public function addAgentSpeciality(Speciality $speciality): self
    {
        if (!$this->agentSpecialities->contains($speciality)) {
            $this->agentSpecialities[] = $speciality;

            $agentSpeciality = new AgentSpeciality();
            $specialityId = $speciality->getId();
            $agentSpecialityId = $this->getId().$specialityId;
            $agentSpeciality->setId($agentSpecialityId);
        }

        return $this;
    }

    public function removeAgentSpeciality(Speciality $speciality): self
    {
        $this->agentSpecialities->removeElement($speciality);
        return $this;
    }

    public function getMission(): int
    {
        return $this->mission;
    }

    public function setMission(int $mission): void
    {
        $this->mission = $mission;
    }


}