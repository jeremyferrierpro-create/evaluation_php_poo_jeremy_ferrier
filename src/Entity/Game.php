<?php

namespace App\Entity;

use DateTimeImmutable;

class Game
{
    
// Attributs
    private ?int $id = null;
    private string $title;
    private string $type;
    private DateTimeImmutable $publishAt;
    private Console $console;

    // Constructeur
    public function __construct(string $title, string $type, DateTimeImmutable $publishAt, Console $console)
    {
        $this->title = $title;
        $this->type = $type;
        $this->publishAt = $publishAt;
        $this->console = $console;
    }

    // Getters et Setters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getPublishAt(): DateTimeImmutable
    {
        return $this->publishAt;
    }

    public function setPublishAt(DateTimeImmutable $publishAt): void
    {
        $this->publishAt = $publishAt;
    }

    public function getConsole(): Console
    {
        return $this->console;
    }

    public function setConsole(Console $console): void
    {
        $this->console = $console;
    }
}
