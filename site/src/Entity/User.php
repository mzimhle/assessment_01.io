<?php

namespace App\Entity;

use Stringable;
use DateTime;
use App\Entity\MappedSuperclass\AbstractUser;
use App\Entity\Delivery;
use App\Entity\Rideshare;
use App\Entity\Rent;

/**
 * Main class for the user.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class User extends AbstractUser implements Stringable {

    public ?Delivery $delivery;
    
    public ?Rideshare $rideshare;
    
    public ?Rent $rent;

    /**
     * Construct - Set default values
     *
     * @param string $name
     *
     * @return void
     */
    public function __construct(string $name, DateTime $date)
    {
        parent::__construct($name);
        // Initialize objects
        $this->delivery = new Delivery($date);
        $this->rideshare = new Rideshare($date);
        $this->rent = new Rent($date);
    }

    /**
     *
     * Return name of the user should object need to be converted to a string.
     *  
     * @return string
     */
    public function __toString(): string
    {
        return sprintf('Employee <strong>%s</strong> <br />%s <br />%s <br />%s<br />Total Points: <b>%d</b> with <b>%d</b> month end will be removed.', $this->name, $this->delivery, $this->rideshare, $this->rent, $this->TotalPoints(), $this->TotalExpiry());
    }

    /**
     *
     * Return total number of points for all actions in this given time
     *
     */
    public function TotalPoints(): int
    {
        return $this->delivery->calculateAllPoints() + $this->rideshare->calculateAllPoints() + $this->rent->calculateAllPoints();
    }
    
    /**
     *
     * Total number of points after expiry
     *
     */
    public function TotalExpiry(): int
    {
        return $this->TotalPoints() - ($this->delivery->calculateExpiryPoints() + $this->rideshare->calculateExpiryPoints() + $this->rent->calculateExpiryPoints());
    }    
}