<?php

namespace App\Entity;

use Stringable;
use DateTime;
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

class Delivery extends AbstractAction implements Action, Stringable
{
    use ActionTrait;
    /**
     * @var int
     */
    protected int $point = 1;

    /**
     * @var int
     */
    protected int $every = 2;

    /**
     * @var bool
     */
    protected bool $boosterAllowed = true;

    /**
     * @var int
     */
    protected int $boosterPoint = 5;

    /**
     * @var int
     */
    protected int $boosterEvery = 2;

    /**
     * Construct
     *
     */
    public function __construct(public DateTime $date)
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
        return sprintf('Deliveries: <b>%d</b> deliveries in <b>%d</b> hours with <b>%d</b> points and will get <b>%d</b> additional points. Totalling <b>%d</b> points. After a month it will be: <b>%d</b> <br />', $this->getQuantity(), $this->getTime(), $this->calculatePoints(), $this->calculateBoosterPoints(), $this->calculateAllPoints(), $this->calculateExpiryPoints());
    }

    /**
     * Calculate recieved points
     *
     *
     */
    public function calculatePoints(): int {           
        return $this->getPoint()*$this->getQuantity();
    }

    /**
     * Current booster calculation, only one booster 
     *
     *
     */
    public function calculateBoosterPoints(): int {
        return BoostDelivery::currentBooster($this);
    }

    /**
     * Calculate all points.
     *
     *
     */
    public function calculateAllPoints(): int {
        return $this->calculatePoints() + $this->calculateBoosterPoints();
    }

    /**
     * Calculate expirey date points
     *
     *
     */
    public function calculateExpiryPoints(): int {
        return $this->calculateAllPoints() - $this->calculateBoosterPoints();
    }
}