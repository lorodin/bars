<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (name="tickets")
 */
class Ticket
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
     * @ORM\Column (
     *     name="book_ref",
     *     type="string",
     *     length=6
     * )
     *
     * @var string
     */
    protected string $book_ref;

    /**
     * @ORM\Column (
     *     name="passenger_id",
     *     type="string",
     *     length=20
     * )
     *
     * @var string
     */
    protected string $passenger_id;

    /**
     * @ORM\Column (
     *     name="passenger_name",
     *     type="text"
     * )
     *
     * @var string
     */
    protected string $passenger_name;

    /**
     * @ORM\Column  (
     *      name="contact_data",
     *      type="json",
     *      columnDefinition="jsonb",
     *      nullable=true
     * )
     *
     * @var
     */
    protected $contact_data;

    /**
     * @ORM\ManyToOne(targetEntity="Booking")
     * @ORM\JoinColumn(name="book_ref", referencedColumnName="book_ref")
     *
     * @var Booking
     */
    protected Booking $booking;
}
