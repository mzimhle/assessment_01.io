<?php

namespace App\Entity;

use App\Entity\MappedSuperclass\AbstractAction;
use App\Entity\Implement\Action;
use App\Entity\Traits\ActionTrait;

/**
 * Main class for the ride share.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class Rideshare extends AbstractAction implements Action {

    use ActionTrait;

    protected $point = 1;
    protected $every = 1;
    protected $boosterAllowed = true;
    protected $boosterPoint = 10;
    protected $boosterEvery = 8;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        parent::__construct($this->point, $this->every, $this->boosterAllowed, $this->boosterPoint, $this->boosterEvery);
    }

    /**
     *
     * Return the object as a string.
     *  
     * @return string
     */
    public function __toString(): string
    {
        return "Rideshare: <b>{$this->getQuantity()}</b> ride shares in <b>{$this->getTime()}</b> hours with <b>{$this->calculatePoints()}</b> points and will get <b>{$this->calculateAdditionalPoints()}</b> additional points. Totalling <b>{$this->calculateAllPoints()}</b> points. After a month it will be: <b>{$this->calculateExpiryPoints()}</b> <br />";
    }
    
    /**
     * Calculate recieved points
     *
     * @return int
     *
     */
    public function calculatePoints(): int {
        return (int)($this->getPoint()*$this->getEvery())*$this->getQuantity();
    }
    
    /**
     * On submission of the form, this is to calculate after submission.
     *
     * @return int
     *
     */
    public function calculateAdditionalPoints(): int {
        if($this->getBoosterAllowed()) {
            if($this->getBoosterEvery() !== 0 && $this->getTime() !== 0 && 
                ((int)($this->getTime() / $this->getBoosterEvery())) > 0) {
                    return $this->getBoosterPoint();
            }
        }
        return 0;
    }   

    /**
     * Calculate all points.
     *
     * @return int
     *
     */
    public function calculateAllPoints(): int {
        return $this->calculatePoints() + $this->calculateAdditionalPoints();
    }

    /**
     * Calculate expirey date points
     *
     * @return int
     *
     */
    public function calculateExpiryPoints(): int {
        return $this->calculateAllPoints() - $this->calculateAdditionalPoints();
    }    
}