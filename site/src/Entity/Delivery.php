<?php

namespace App\Entity;

use App\Entity\MappedSuperclass\AbstractAction;
use App\Entity\Implement\Action;
use App\Entity\Traits\ActionTrait;

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
    protected $every = 1;
    protected $boosterAllowed = true;
    protected $boosterPoint = 5;
    protected $boosterEvery = 2;

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
     * Return name of the user should object need to be converted to a string.
     *  
     * @return string
     */
    public function __toString(): string
    {
        return ucwords(strtolower(sprintf('Calculation is this')));
    }
    
    /**
     * On submission of the form, this is to calculate after submission.
     *
     * @return string
     *
     */
    public function calculate(): string { }
}