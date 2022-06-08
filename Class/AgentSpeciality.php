<?php

class AgentSpeciality
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $agentId, int $specialityId): void
    {
        $this->id = $agentId.$specialityId;
    }


}