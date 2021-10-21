<?php

namespace App\Entity;

use App\Repository\VacationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VacationRepository::class)
 */
class Vacation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $employeeIdVacation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reason;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstDay;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastDay;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $validation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeIdVacation(): ?int
    {
        return $this->employeeIdVacation;
    }

    public function setEmployeeIdVacation(int $employeeIdVacation): self
    {
        $this->employeeIdVacation = $employeeIdVacation;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getFirstDay(): ?string
    {
        return $this->firstDay;
    }

    public function setFirstDay(string $firstDay): self
    {
        $this->firstDay = $firstDay;

        return $this;
    }

    public function getLastDay(): ?string
    {
        return $this->lastDay;
    }

    public function setLastDay(string $lastDay): self
    {
        $this->lastDay = $lastDay;

        return $this;
    }

    public function getValidation(): ?string
    {
        return $this->validation;
    }

    public function setValidation(string $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }
}
