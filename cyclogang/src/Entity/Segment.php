<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SegmentRepository")
 */
class Segment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $strava_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Discipline", inversedBy="segments")
     */
    private $discipline;

    /**
     * @ORM\Column(type="integer")
     */
    private $length;

    /**
     * @ORM\Column(type="integer")
     */
    private $distance;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $average_grade;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_elevation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $min_elevation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStravaId(): ?int
    {
        return $this->strava_id;
    }

    public function setStravaId(?int $strava_id): self
    {
        $this->strava_id = $strava_id;

        return $this;
    }

    public function getDiscipline(): ?Discipline
    {
        return $this->discipline;
    }

    public function setDiscipline(?Discipline $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getAverageGrade(): ?int
    {
        return $this->average_grade;
    }

    public function setAverageGrade(?int $average_grade): self
    {
        $this->average_grade = $average_grade;

        return $this;
    }

    public function getMaxElevation(): ?int
    {
        return $this->max_elevation;
    }

    public function setMaxElevation(?int $max_elevation): self
    {
        $this->max_elevation = $max_elevation;

        return $this;
    }

    public function getMinElevation(): ?int
    {
        return $this->min_elevation;
    }

    public function setMinElevation(?int $min_elevation): self
    {
        $this->min_elevation = $min_elevation;

        return $this;
    }
}
