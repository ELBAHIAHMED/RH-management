<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LanguageRepository::class)
 */
class Language
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
    private $firstLan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondLan;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thirdLan;

    /**
     * @ORM\Column(type="integer")
     */
    private $percentageFirst;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $percentageSecond;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $percentageThird;

    /**
     * @ORM\Column(type="integer",unique=true)
     */
    private $employeeId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstLan(): ?string
    {
        return $this->firstLan;
    }

    public function setFirstLan(string $firstLan): self
    {
        $this->firstLan = $firstLan;

        return $this;
    }

    public function getSecondLan(): ?string
    {
        return $this->secondLan;
    }

    public function setSecondLan(?string $secondLan): self
    {
        $this->secondLan = $secondLan;

        return $this;
    }

    public function getThirdLan(): ?string
    {
        return $this->thirdLan;
    }

    public function setThirdLan(?string $thirdLan): self
    {
        $this->thirdLan = $thirdLan;

        return $this;
    }

    public function getPercentageFirst(): ?int
    {
        return $this->percentageFirst;
    }

    public function setPercentageFirst(int $percentageFirst): self
    {
        $this->percentageFirst = $percentageFirst;

        return $this;
    }

    public function getPercentageSecond(): ?int
    {
        return $this->percentageSecond;
    }

    public function setPercentageSecond(?int $percentageSecond): self
    {
        $this->percentageSecond = $percentageSecond;

        return $this;
    }

    public function getPercentageThird(): ?int
    {
        return $this->percentageThird;
    }

    public function setPercentageThird(?int $percentageThird): self
    {
        $this->percentageThird = $percentageThird;

        return $this;
    }

    public function getEmployeeId(): ?int
    {
        return $this->employeeId;
    }

    public function setEmployeeId(int $employeeId): self
    {
        $this->employeeId = $employeeId;

        return $this;
    }
}
