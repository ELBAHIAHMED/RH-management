<?php

namespace App\Entity;

use App\Repository\PersonalSkillsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonalSkillsRepository::class)
 */
class PersonalSkills
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $second;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $third;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fourth;

    /**
     * @ORM\Column(type="integer")
     */
    private $employeeIdPersonalSkills;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFist(): ?string
    {
        return $this->fist;
    }

    public function setFist(string $fist): self
    {
        $this->fist = $fist;

        return $this;
    }

    public function getSecond(): ?string
    {
        return $this->second;
    }

    public function setSecond(string $second): self
    {
        $this->second = $second;

        return $this;
    }

    public function getThird(): ?string
    {
        return $this->third;
    }

    public function setThird(?string $third): self
    {
        $this->third = $third;

        return $this;
    }

    public function getFourth(): ?string
    {
        return $this->fourth;
    }

    public function setFourth(?string $fourth): self
    {
        $this->fourth = $fourth;

        return $this;
    }

    public function getEmployeeIdPersonalSkills(): ?int
    {
        return $this->employeeIdPersonalSkills;
    }

    public function setEmployeeIdPersonalSkills(int $employeeIdPersonalSkills): self
    {
        $this->employeeIdPersonalSkills = $employeeIdPersonalSkills;

        return $this;
    }
}
