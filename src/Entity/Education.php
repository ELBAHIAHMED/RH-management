<?php

namespace App\Entity;

use App\Repository\EducationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EducationRepository::class)
 */
class Education
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer",unique=true)
     */
    private $employeeIdEduc;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $elementarySchool;

    /**
     * @ORM\Column(type="string", length=300)
     */
    private $highSchool;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $college;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $university;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $master;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $elementarySchool1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $highSchool1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $college1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $university1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $master1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeIdEduc(): ?int
    {
        return $this->employeeIdEduc;
    }

    public function setEmployeeIdEduc(int $employeeIdEduc): self
    {
        $this->employeeIdEduc = $employeeIdEduc;

        return $this;
    }

    public function getElementarySchool(): ?string
    {
        return $this->elementarySchool;
    }

    public function setElementarySchool(string $elementarySchool): self
    {
        $this->elementarySchool = $elementarySchool;

        return $this;
    }

    public function getHighSchool(): ?string
    {
        return $this->highSchool;
    }

    public function setHighSchool(string $highSchool): self
    {
        $this->highSchool = $highSchool;

        return $this;
    }

    public function getCollege(): ?string
    {
        return $this->college;
    }

    public function setCollege(string $college): self
    {
        $this->college = $college;

        return $this;
    }

    public function getUniversity(): ?string
    {
        return $this->university;
    }

    public function setUniversity(string $university): self
    {
        $this->university = $university;

        return $this;
    }

    public function getMaster(): ?string
    {
        return $this->master;
    }

    public function setMaster(string $master): self
    {
        $this->master = $master;

        return $this;
    }

    public function getElementarySchool1(): ?string
    {
        return $this->elementarySchool1;
    }

    public function setElementarySchool1(string $elementarySchool1): self
    {
        $this->elementarySchool1 = $elementarySchool1;

        return $this;
    }

    public function getHighSchool1(): ?string
    {
        return $this->highSchool1;
    }

    public function setHighSchool1(string $highSchool1): self
    {
        $this->highSchool1 = $highSchool1;

        return $this;
    }

    public function getCollege1(): ?string
    {
        return $this->college1;
    }

    public function setCollege1(string $college1): self
    {
        $this->college1 = $college1;

        return $this;
    }

    public function getUniversity1(): ?string
    {
        return $this->university1;
    }

    public function setUniversity1(string $university1): self
    {
        $this->university1 = $university1;

        return $this;
    }

    public function getMaster1(): ?string
    {
        return $this->master1;
    }

    public function setMaster1(string $master1): self
    {
        $this->master1 = $master1;

        return $this;
    }
}
