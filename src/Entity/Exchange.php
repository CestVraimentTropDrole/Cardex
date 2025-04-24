<?php

namespace App\Entity;

use App\Repository\ExchangeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExchangeRepository::class)]
class Exchange
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Card $card_given = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Card $card_recieved = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCardGiven(): ?Card
    {
        return $this->card_given;
    }

    public function setCardGiven(?Card $card_given): static
    {
        $this->card_given = $card_given;

        return $this;
    }

    public function getCardRecieved(): ?Card
    {
        return $this->card_recieved;
    }

    public function setCardRecieved(?Card $card_recieved): static
    {
        $this->card_recieved = $card_recieved;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
