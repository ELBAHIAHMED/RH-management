<?php

namespace App\Entity;

use App\Repository\SkillsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillsRepository::class)
 */
class Skills
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
     * @ORM\Column(type="integer")
     */
    private $firstPerc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $second;

    /**
     * @ORM\Column(type="integer")
     */
    private $secondPercent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $third;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $thirdPerc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fourth;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fourthPerc;

    /**
     * @ORM\Column(type="integer")
     */
    private $employeeIdSkills;

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

    public function getFirstPerc(): ?int
    {
        return $this->firstPerc;
    }

    public function setFirstPerc(int $firstPerc): self
    {
        $this->firstPerc = $firstPerc;

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

    public function getSecondPercent(): ?int
    {
        return $this->secondPercent;
    }

    public function setSecondPercent(int $secondPercent): self
    {
        $this->secondPercent = $secondPercent;

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

    public function getThirdPerc(): ?int
    {
        return $this->thirdPerc;
    }

    public function setThirdPerc(?int $thirdPerc): self
    {
        $this->thirdPerc = $thirdPerc;

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

    public function getFourthPerc(): ?int
    {
        return $this->fourthPerc;
    }

    public function setFourthPerc(?int $fourthPerc): self
    {
        $this->fourthPerc = $fourthPerc;

        return $this;
    }

    public function getEmployeeIdSkills(): ?int
    {
        return $this->employeeIdSkills;
    }

    public function setEmployeeIdSkills(int $employeeIdSkills): self
    {
        $this->employeeIdSkills = $employeeIdSkills;

        return $this;
    }
}
