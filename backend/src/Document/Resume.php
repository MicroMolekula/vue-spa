<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document]
class Resume
{
    #[MongoDB\Id]
    protected ?string $id = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $profession = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $about = null;

    #[MongoDB\Field(type: 'hash')]
    protected ?array $city = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $photo = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $name = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $phone = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $email = null;

    #[MongoDB\Field(type: 'date')]
    protected ?\DateTime $dateBirth = null;

    #[MongoDB\Field(type: 'hash')]
    protected ?array $education = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $salary = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $skills = null;

    #[MongoDB\Field(type: 'string')]
    protected ?string $status = null;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): Resume
    {
        $this->id = $id;
        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): Resume
    {
        $this->profession = $profession;
        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): Resume
    {
        $this->about = $about;
        return $this;
    }

    public function getCity(): ?array
    {
        return $this->city;
    }

    public function setCity(?array $city): Resume
    {
        $this->city = $city;
        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): Resume
    {
        $this->photo = $photo;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Resume
    {
        $this->name = $name;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): Resume
    {
        $this->phone = $phone;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Resume
    {
        $this->email = $email;
        return $this;
    }

    public function getDateBirth(): ?\DateTime
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?\DateTime $dateBirth): Resume
    {
        $this->dateBirth = $dateBirth;
        return $this;
    }

    public function getEducation(): ?array
    {
        return $this->education;
    }

    public function setEducation(?array $education): Resume
    {
        $this->education = $education;
        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): Resume
    {
        $this->skills = $skills;
        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): Resume
    {
        $this->salary = $salary;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): Resume
    {
        $this->status = $status;
        return $this;
    }
}