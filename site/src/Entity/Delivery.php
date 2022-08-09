<?php

namespace App\Entity;

use App\Entity\MappedSuperclass\AbstractAction;
use App\Entity\Implement\Action;
use App\Entity\Traits\ActionTrait;
use App\Entity\Booster\BoostDelivery;

/**
 * Main class for the deliveries.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class Delivery extends AbstractAction implements Action {

    use ActionTrait;

    protected $point = 1;
    protected $every = 2;
    protected $boosterAllowed = true;
    protected $boosterPoint = 5;
    protected $boosterEvery = 2;
    
    public \DateTime $date;

    /**
     * Construct
     *
     */
    public function __construct(\DateTime $date)
    {
        $this->date = $date;
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
        return "Deliveries: <b>{$this->getQuantity()}</b> deliveries in <b>{$this->getTime()}</b> hours with <b>{$this->calculatePoints()}</b> points and will get <b>{$this->calculateBoosterPoints()}</b> additional points. Totalling <b>{$this->calculateAllPoints()}</b> points. After a month it will be: <b>{$this->calculateExpiryPoints()}</b> <br />";
    }
    
    /**
     * Calculate recieved points
     *
     * @return int
     *
     */
    public function calculatePoints(): int {           
        return (int)($this->getTime()/$this->getPoint())*$this->getQuantity();
    }
    
    /**
     * Current booster calculation, only one booster 
     *
     * @return int
     *
     */
    public function calculateBoosterPoints(): int {
        return BoostDelivery::currentBooster($this);
    }   

    /**
     * Calculate all points.
     *
     * @return int
     *
     */
    public function calculateAllPoints(): int {
        return $this->calculatePoints() + $this->calculateBoosterPoints();
    }

    /**
     * Calculate expirey date points
     *
     * @return int
     *
     */
    public function calculateExpiryPoints(): int {
        return $this->calculateAllPoints() - $this->calculateBoosterPoints();
    }    
}