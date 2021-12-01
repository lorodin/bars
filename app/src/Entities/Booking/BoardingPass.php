<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (
 *     schema="bookings",
 *     name="boarding_passes",
 *     uniqueConstraints={
 *          @ORM\UniqueConstraint (
 *              name="flight_boarding",
 *              columns={ "flight_id", "boarding_no" }
 *          ),
 *          @ORM\UniqueConstraint (
 *              name="flight_seat",
 *              columns={ "flight_id", "seat_no" }
 *          )
 *     }
 * )
 */
class BoardingPass
{
    /**
     * @ORM\Id
     * @ORM\Column (
     *     name="ticket_no",
     *     type="string",
     *     length=13
     * )
     *
     * @var string
     */
    protected string $ticket_no;

    /**
     * @ORM\Id
     * @ORM\Column (
     *     name="flight_id",
     *     type="integer"
     * )
     *
     * @var int
     */
    protected int $flight_id;

    /**
     * @ORM\Column (
     *     name="boarding_no",
     *     type="integer"
     * )
     *
     * @var int
     */
    protected int $boarding_no;

    /**
     * @ORM\Column (
     *     name="seat_no",
     *     type="string",
     *     length=4,
     *     options={"fixed" = true}
     * )
     *
     * @var string
     */
    protected string $seat_no;

    /**
     * @ORM\OneToOne(targetEntity="TicketFlights")
     * @ORM\JoinColumns(
     *     @ORM\JoinColumn (name="ticket_no", referencedColumnName="ticket_no", onDelete="cascade"),
     *     @ORM\JoinColumn (name="flight_id", referencedColumnName="flight_id", onDelete="cascade")
     * )
     *
     * @var TicketFlights
     */
    protected TicketFlights $ticket_flights;
}
