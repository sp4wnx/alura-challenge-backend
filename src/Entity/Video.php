<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\VideoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: VideoRepository::class)]
#[ApiResource]
class Video
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Sequentially([
        new Assert\NotNull,
        new Assert\Length(
            min: 10,
            max: 255
        )
    ])]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Sequentially([
        new Assert\NotNull,
        new Assert\Length(
            min: 30
        )
    ])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\Sequentially([
        new Assert\NotNull,
        new Assert\Url
    ])]
    private ?string $url = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
