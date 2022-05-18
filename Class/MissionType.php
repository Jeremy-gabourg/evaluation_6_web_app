<?php

class MissionType
{
    private int $id;
    private string $missionTypeName;

    public function __construct(int $id, string $missionTypeName)
    {
        $this->id = $id;
        $this->missionTypeName = $missionTypeName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getMissionTypeName(): string
    {
        return $this->missionTypeName;
    }

    public function setMissionTypeName(string $missionTypeName): void
    {
        $this->missionTypeName = $missionTypeName;
    }


}