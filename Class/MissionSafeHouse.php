<?php

class MissionSafeHouse
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $missionId, int $safeHouseId): void
    {
        $this->id = $missionId.$safeHouseId;
    }


}