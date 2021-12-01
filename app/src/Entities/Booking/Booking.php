<?php

namespace App\Entities\Booking;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table (
 *     name="bookings",
 *     schema="bookings"
 * )
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\Column (
     *     name="book_ref",
     *     type="string",
     *     length=6,
     *     options={"fixed" = true}
     * )
     *
     * @var string
     */
    protected string $book_ref;

    /**
     * @ORM\Column (
     *     name="book_date",
     *     type="datetimetz"
     * )
     *
     * @var \DateTime
     */
    protected \DateTime $book_date;

    /**
     * @ORM\Column (
     *     name="total_amount",
     *     type="decimal",
     *     precision=10,
     *     scale=2
     * )
     *
     * @var float
     */
    protected float $total_amount;
}
