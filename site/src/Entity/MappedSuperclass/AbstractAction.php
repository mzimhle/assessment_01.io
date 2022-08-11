<?php

namespace App\Entity\MappedSuperclass;

/**
 * Abstract class for the user actions.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

abstract class AbstractAction {
    
  /**
  * Construct - Set default values
  *
  * @param int $point           - The quantity of a normal point given for an action
  * @param int $every           - The number of times that point will be given, e.g. 1 per hour/day
  * @param bool $boosterAllowed - Are booster points allowed for this action
  * @param int $boosterPoint    - If allowed, the number of points given
  * @param int $boosterEvery    - The number of times booster points are given after a certain time
  *
  * @return void
  */
  function __construct(protected int $point, protected int $every, protected bool $boosterAllowed, protected int $boosterPoint, protected int $boosterEvery)
  {
  }
  
 /**
  * @return int
  */
  function getPoint(): int
  {
   return $this->point;
  }
  
 /**
  * @return int
  */
  function getEvery(): int
  {
   return $this->every;
  }
  
 /**
  * @return bool
  */
  function getBoosterAllowed(): bool
  {
   return $this->boosterAllowed;
  }

 /**
  * @return int
  */
  function getBoosterPoint(): int
  {
   return $this->boosterPoint;
  }

 /**
  * @return int
  */
  function getBoosterEvery(): int
  {
   return $this->boosterEvery;
  }
  
 /**
   * @return Action
   */
  function setPoint(int $point): Action 
  {
   $this->point = $point;
   return $this;
  }

 /**
   * @return Action
   */
  function setEvery(int $every): Action 
  {
   $this->every = $every;
   return $this;
  }
 
  /**
   * @return Action
   */
  function setBoosterAllowed(bool $boosterAllowed): Action 
  {
   $this->boosterAllowed = $boosterAllowed;
   return $this;
  }

  /**
   * @return Action
   */
  function setBoosterPoint(int $boosterPoint): Action 
  {
   $this->boosterPoint = $boosterPoint;
   return $this;
  }
 
  /**
   * @return Action
   */
  function setBoosterEvery(int $boosterEvery): Action 
  {
   $this->boosterEvery = $boosterEvery;
   return $this;
  }
  
}