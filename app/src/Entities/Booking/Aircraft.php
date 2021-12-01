<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="aircrafts_data",
 *     schema="bookings"
 * )
 */
class Aircraft
{
    /**
     * @ORM\Id
     * @ORM\Column(
     *     name="aircraft_code",
     *     type="string",
     *     length=3,
     *     options={"fixed" = true}
     * )
     * @var string
     */
    protected string $aircraft_code;

    /**
     * @ORM\Column(
     *     name="model",
     *     type="json",
     *     columnDefinition="jsonb NOT NULL"
     * )
     * @var string
     */
    protected string $model;

    /**
     * @ORM\Column (
     *     name = "range",
     *     type = "integer",
     *     columnDefinition="integer NOT NULL CHECK(range > 0)"
     * )
     * @var int
     */
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
