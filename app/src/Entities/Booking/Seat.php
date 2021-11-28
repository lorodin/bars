<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="seats")
 */
class Seat
{
    /**
     * @ORM\Id
     * @ORM\Column (name="aircraft_code", type="string", length=3)
     * @var string
     */
    protected string $aircraft_code;

    /**
     * @ORM\Id
     * @ORM\Column (name="seat_no", type="string", length=4)
     * @var string
     */
    protected string $seat_no;

    /**
     * @ORM\Column (
     *     name = "fave_conditions",
     *     type = "string",
     *     length = 10,
     *     columnDefinition = "varchar(10) not null check(fave_conditions in ('Economy', 'Comform', 'Business'))"
     * )
     * @var string
     */
    protected string $fave_conditions;

    /**
     * @ORM\ManyToOne(targetEntity="Aircraft")
     * @ORM\JoinColumn(name="aircraft_code", referencedColumnName="aircraft_code", onDelete="cascade")
     */
    protected Aircraft $aircraft;

    public function setAircraftCode(string $code)
    {
        $this->aircraft_code = $code;
    }

    public function getAircraftCode(): ?string
    {
        return $this->aircraft_code;
    }

    public function setSeatNo(string $seat_no)
    {
        $this->seat_no = $seat_no;
    }
}
