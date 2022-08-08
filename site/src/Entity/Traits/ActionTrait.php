<?php

namespace App\Entity\Traits;

/**
 * Trait for the action objects.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */
trait ActionTrait
{
    private int $quantity;
    private int $time;

    /**
    * @return int
    */
    function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
    * @return int
    */
    function getTime(): int
    {
        return $this->time;
    }
  
    /**
    * @param int $quantity
    * @return self
    */
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
    * @param int $time
    * @return self
    */
    public function setTime(int $time): self
    {
        $this->time = $time;
        return $this;        
    }

}

?>