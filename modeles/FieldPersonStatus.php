<?php

class FieldPersonStatus
{
    private int $id;
    private string $statusName;

    public function __construct(int $id, string $statusName)
    {
        $this->id = $id;
        $this->statusName = $statusName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getStatusName(): string
    {
        return $this->statusName;
    }

    public function setStatusName(string $statusName): void
    {
        $this->statusName = $statusName;
    }


}