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
  * On submission of the form, this is to calculate after submission.
  *
  * @return string
  *
  */
    public function calculate(): string;

}
?>