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

    function getQuantity(): int
    {
        return $this->quantity;
    }

    function getTime(): int
    {
        return $this->time;
    }
  
    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;
        return $this;        
    }

}

?>