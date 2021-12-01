<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (
 *     name="flights",
 *     schema="bookings",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint (
 *              name="flight_no_unique",
 *              columns={"flight_no", "scheduled_departure"}
 *          )
 *     }
 * )
 */
class Flight
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @var int
     */
    protected int $flight_id;

    /**
     * @ORM\Column (
     *     name="flight_no",
     *     type="string",
     *     length=6,
     *     options={"fixed" = true}
     * )
     *
     * @var string
     */
    protected string $flight_no;

    /**
     * @ORM\Column (
     *     name="scheduled_departure",
     *     type="datetimetz"
     * )
     *
     * @var \DateTime
     */
    protected \DateTime $scheduled_departure;

    /**
     * @ORM\Column (
     *     name="scheduled_arrival",
     *     type="datetimetz",
     *     columnDefinition="timestamptz not null check(scheduled_arrival > scheduled_departure)"
     * )
     *
     * @var \DateTime
     */
    protected \DateTime $scheduled_arrival;

    /**
     * @ORM\Column (
     *     name = "departure_airport",
     *     type="string",
     *     length=3,
     *     options={"fixed" = true}
     * )
     *
     * @var string
     */
    protected string $departure_airport;

    /**
     * @ORM\Column (
     *     name="arrival_airport",
     *     type="string",
     *     length=3,
     *     options={"fixed": true}
     * )
     *
     * @var string
     */
    protected string $arrival_airport;

    /**
     * @ORM\Column (
     *     name="status",
     *     type="string",
     *     length=20,
     *     columnDefinition="varchar(20) not null check(status in ('On Time', 'Delayed', 'Departed', 'Arrived', 'Scheduled', 'Cancelled'))"
     * )
     *
     * @var string
     */
    protected string $status;

    /**
     * @ORM\Column (
     *     name="aircraft_code",
     *     type="string",
     *     length=3,
     *     options={"fixed" = true}
     * )
     *
     * @var string
     */
    protected string $aircraft_code;

    /**
     * @ORM\Column (
     *     name="actual_departure",
     *     type="datetimetz",
     *     nullable=true
     * )
     *
     * @var \DateTime
     */
    protected \DateTime $actual_departure;

    /**
     * @ORM\Column (
     *     name="actual_arrival",
     *     type="datetimetz",
     *     nullable=true,
     *     columnDefinition="timestamptz
                    check (actual_arrival is null
                            OR (actual_departure IS NOT NULL
                                AND actual_arrival IS NOT NULL
                                AND actual_arrival > actual_departure
                                )
                     )"
     * )
     *
     * @var \DateTime
     */
    protected \DateTime $actual_arrival;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Airport")
     * @ORM\JoinColumn(name="arrival_airport", referencedColumnName="airport_code")
     *
     * @var Airport
     */
    protected Airport $arrival;

    /**
     * @ORM\ManyToOne(targetEntity="Airport")
     * @ORM\JoinColumn(name="departure_airport", referencedColumnName="airport_code")
     *
     * @var Airport
     */
    protected Airport $departure;

    /**
     * @ORM\ManyToOne(targetEntity="Aircraft")
     * @ORM\JoinColumn(name="aircraft_code", referencedColumnName="aircraft_code")
     *
     * @var Aircraft
     */
    protected Aircraft $aircraft;
}
