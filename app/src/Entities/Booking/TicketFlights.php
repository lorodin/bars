<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="ticket_flights")
 */
class TicketFlights
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
     *     name="fare_conditions",
     *     type="string",
     *     length=20,
     *     columnDefinition="varchar(10) not null check(fare_conditions in ('Economy', 'Comfort', 'Business'))"
     * )
     *
     * @var string
     */
    protected string $fare_conditions;

    /**
     * @ORM\Column (
     *     name="amount",
     *     type="decimal",
     *     columnDefinition="numeric(10, 2) not null check(amount > 0)"
     * )
     *
     * @var float
     */
    protected float $amount;

    /**
     * @ORM\ManyToOne(targetEntity="Flight")
     * @ORM\JoinColumn(name="flight_id", referencedColumnName="flight_id", onDelete="cascade")
     *
     * @var Flight
     */
    protected Flight $flight;

    /**
     * @ORM\ManyToOne(targetEntity="Ticket")
     * @ORM\JoinColumn(name="ticket_no", referencedColumnName="ticket_no", onDelete="cascade")
     *
     * @var Ticket
     */
    protected Ticket $ticket;
}
