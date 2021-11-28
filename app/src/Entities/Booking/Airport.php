<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="airports")
 */
class Airport
{
    /**
     * @ORM\Id
     * @ORM\Column (name = "airport_code", type="string", length=3)
     * @var string
     */
    protected string $airport_code;

    /**
     * @ORM\Column (name = "airport_name", type="text")
     * @var string
     */
    protected string $airport_name;

    /**
     * @ORM\Column (name = "city", type="text")
     * @var string
     */
    protected string $city;

    /**
     * @ORM\Column (name="coordinates", type="point")
     * @var array [
     *               "longitude" => float,
     *               "latitude"  => float
     *            ]
     */
    protected array $coordinates;

    /**
     * @ORM\Column (name="timezone", type="smallint", columnDefinition="smallint not null check(timezone >= -12 and timezone <= 12)")
     * @var int
     */
    protected int $timezone;
}
