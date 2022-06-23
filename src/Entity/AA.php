<?php

namespace App\Entity;

use App\Repository\AARepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AARepository::class)]
class AA
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
