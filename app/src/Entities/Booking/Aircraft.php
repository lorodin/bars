<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aircrafts")
 */
class Aircraft
{
    /**
     * @ORM\Id
     * @ORM\Column(name="aircraft_code", type="string", length=3)
     * @var string
     */
    protected string $aircraft_code;

    /**
     * @ORM\Column(name="model", type="text")
     * @var string
     */
    protected string $model;

    protected int $range;

    public function getAircraftCode(): ?string
    {
        return $this->aircraft_code;
    }

    public function setAircraftCode(string $code)
    {
        $this->aircraft_code = $code;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getRange(): ?int
    {
        return $this->range;
    }

    public function setRange(int $range)
    {
        $this->range = $range;
    }
}
