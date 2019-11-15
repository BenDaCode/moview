<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MoviesRepository")
 */
class Movies
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="text")
     */
    public $mov_title;

    /**
     * @ORM\Column(type="integer")
     */
    public $mov_id;

    /**
     * @ORM\Column(type="integer")
     */
    public $mov_year;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $mov_desc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    public $mov_poster;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovTitle(): ?string
    {
        return $this->mov_title;
    }

    public function setMovTitle(string $mov_title): self
    {
        $this->mov_title = $mov_title;

        return $this;
    }

    public function getMovId(): ?int
    {
        return $this->mov_id;
    }

    public function setMovId(int $mov_id): self
    {
        $this->mov_id = $mov_id;

        return $this;
    }

    public function getMovYear(): ?int
    {
        return $this->mov_year;
    }

    public function setMovYear(int $mov_year): self
    {
        $this->mov_year = $mov_year;

        return $this;
    }

    public function getMovDesc(): ?string
    {
        return $this->mov_desc;
    }

    public function setMovDesc(?string $mov_desc): self
    {
        $this->mov_desc = $mov_desc;

        return $this;
    }

    public function getMovPoster(): ?string
    {
        return $this->mov_poster;
    }

    public function setMovPoster(?string $mov_poster): self
    {
        $this->mov_poster = $mov_poster;

        return $this;
    }
}
