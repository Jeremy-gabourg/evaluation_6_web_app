<?php

class FieldPersonType
{
    private int $id;
    private string $typeName;

    public function __construct(int $id, string $typeName)
    {
        $this->id = $id;
        $this->typeName = $typeName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTypeName(): string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): void
    {
        $this->typeName = $typeName;
    }

}