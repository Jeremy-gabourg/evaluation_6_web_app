<?php

class MissionStatus
{
    private int $id;
    private string $missionStatusName;

    public function __construct(int $id, string $missionStatusName)
    {
        $this->id = $id;
        $this->missionStatusName = $missionStatusName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getMissionStatusName(): string
    {
        return $this->missionStatusName;
    }

    public function setMissionStatusName(string $missionStatusName): void
    {
        $this->missionStatusName = $missionStatusName;
    }


}