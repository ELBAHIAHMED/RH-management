<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceRepository::class)
 */
class Experience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $firstExperience;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $secondExperience;

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $thirdExperience;

    /**
     * @ORM\Column(type="integer",unique=true)
     */
    private $employeeIdExp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstExperience(): ?string
    {
        return $this->firstExperience;
    }

    public function setFirstExperience(string $firstExperience): self
    {
        $this->firstExperience = $firstExperience;

        return $this;
    }

    public function getSecondExperience(): ?string
    {
        return $this->secondExperince;
    }

    public function setSecondExperience(string $secondExperience): self
    {
        $this->secondExperience = $secondExperience;

        return $this;
    }

    public function getThirdExperience(): ?string
    {
        return $this->thirdExperience;
    }

    public function setThirdExperience(?string $thirdExperience): self
    {
        $this->thirdExperience = $thirdExperience;

        return $this;
    }

    public function getEmployeeIdExp(): ?int
    {
        return $this->employeeIdExp;
    }

    public function setEmployeeIdExp(int $employeeIdExp): self
    {
        $this->employeeIdExp = $employeeIdExp;

        return $this;
    }
}
