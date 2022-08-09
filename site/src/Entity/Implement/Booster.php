<?php

namespace App\Entity\Implement;

/**
 * Interface for boosters
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

interface Booster {

 /**
  * Get currently selected booster
  *
  * @return int
  *
  */
    public static function currentBooster(Object $obj): int;

 /**
  * Check if the object is correct.
  *
  * @return bool
  * @throws Exception
  *
  */
    public static function checkObject(Object $obj): bool;
}
?>