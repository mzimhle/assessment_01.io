<?php

namespace App\Entity;

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

class User extends AbstractUser {

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
    public function __construct(string $name, \DateTime $date)
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
        return "Employee <strong>{$this->name}</strong> <br />{$this->delivery} <br />{$this->rideshare} <br />{$this->rent}<br />Total Points: <b>{$this->TotalPoints()}</b> with <b>{$this->TotalExpiry()}</b> month end will be removed.";
    }

    /**
     *
     * Return total number of points for all actions in this given time
     *  
     * @return int
     */
    public function TotalPoints(): int
    {
        return $this->delivery->calculateAllPoints() + $this->rideshare->calculateAllPoints() + $this->rent->calculateAllPoints();
    }
    
    /**
     *
     * Total number of points after expiry
     *  
     * @return int
     */
    public function TotalExpiry(): int
    {
        return $this->TotalPoints() - ($this->delivery->calculateExpiryPoints() + $this->rideshare->calculateExpiryPoints() + $this->rent->calculateExpiryPoints());
    }    
}