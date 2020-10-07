<?php

namespace app\src\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ship
 *
 * @ORM\Table(name="Ship")
 * @ORM\Entity(repositoryClass="app\src\Entity\ShipRepository")
 */
class Ship
{
    /**
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private string $name;

    /**
     * @ORM\Column(name="serial_number", type="integer", length=10, precision=0, scale=0, nullable=false, unique=false)
     */
    private int $serial_number;

    /**
     * @ORM\Column(name="img_url", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private string $img_url;

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSerial_number(int $serial_number): self
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getSerial_number(): int
    {
        return $this->serial_number;
    }

    public function setImg_url(string $img_url): self
    {
        $this->img_url = $img_url;

        return $this;
    }

    public function getImg_url(): string
    {
        return $this->serial_number;
    }


}
