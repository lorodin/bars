<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="airports_data",
 *     schema="bookings"
 * )
 */
class Airport
{
    /**
     * @ORM\Id
     * @ORM\Column (
     *     name = "airport_code",
     *     type="string",
     *     length=3,
     *     options={"fixed" = true}
     * )
     * @var string
     */
    protected string $airport_code;

    /**
     * @ORM\Column (
     *     name = "airport_name",
     *     type="json",
     *     columnDefinition="jsonb NOT NULL"
     * )
     * @var string
     */
    protected string $airport_name;

    /**
     * @ORM\Column (
     *     name = "city",
     *     type="json",
     *     columnDefinition="jsonb NOT NULL"
     * )
     * @var string
     */
    protected string $city;

    /**
     * @ORM\Column (name="coordinates", type="point", columnDefinition="point not null")
     * @var array [
     *               "longitude" => float,
     *               "latitude"  => float
     *            ]
     */
    protected array $coordinates;

    /**
     * @ORM\Column (
     *     name="timezone",
     *     type="text"
     * )
     * @var int
     */
    protected int $timezone;
}
