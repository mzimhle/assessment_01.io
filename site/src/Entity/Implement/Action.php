<?php

namespace App\Entity\Implement;

/**
 * Interface for actions
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

interface Action {

 /**
  * Method to return string for when object is being converted to string.
  *
  * @return string
  *
  */
    public function __toString(): string;

 /**
  * Calculate points recieved for an action
  *
  * @return int
  *
  */
    public function calculatePoints(): int;

 /**
  * Calculate additional points received
  *
  * @return int
  *
  */
    public function calculateAdditionalPoints(): int;

 /**
  * Calculate total points received
  *
  * @return int
  *
  */
    public function calculateAllPoints(): int;
    
 /**
  * Calculate points after expiry
  *
  * @return int
  *
  */
    public function calculateExpiryPoints(): int;    
}
?>