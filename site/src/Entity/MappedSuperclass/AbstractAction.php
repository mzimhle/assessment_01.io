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
    
  /** @var string */  
  protected $point;
  /** @var int */
  protected $every;  
  /** @var boolean */  
  protected $boosterAllowed;
  /** @var boolean */
  protected $boosterPoint;
  /** @var int */
  protected $boosterEvery;

 /**
  * Construct - Set default values
  *
  * @param int $point                   - The quantity of a normal point given for an action
  * @param int $every                   - The number of times that point will be given, e.g. 1 per hour/day
  * @param boolean $boosterAllowed      - Are booster points allowed for this action
  * @param int $boosterPoint            - If allowed, the number of points given
  * @param int $boosterEvery            - The number of times booster points are given after a certain time
  *
  * @return void
  */
  function __construct(int $point, int $every, boolean $boosterAllowed, int $boosterPoint, int $boosterEvery): void  { 
    
    $this->point = $point;
    $this->every = $every;
    $this->boosterAllowed = $boosterAllowed;    
    $this->boosterPoint = $boosterPoint;
    $this->boosterEvery = $boosterEvery;
    
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
  * @return boolean
  */
  function getBoosterAllowed(): boolean
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
  * @param int $point
  * @return Action
  */
  function setPoint(int $point): Action 
  {
   $this->point = $point;
   return $this;
  }

 /**
  * @param int $every
  * @return Action
  */
  function setEvery(int $every): Action 
  {
   $this->every = $every;
   return $this;
  }
 
  /**
  * @param boolean $boosterAllowed
  * @return Action
  */
  function setBoosterAllowed(boolean $boosterAllowed): Action 
  {
   $this->boosterAllowed = $boosterAllowed;
   return $this;
  }

  /**
  * @param int $boosterPoint
  * @return Action
  */
  function setBoosterPoint(int $boosterPoint): Action 
  {
   $this->boosterPoint = $boosterPoint;
   return $this;
  }
 
  /**
  * @param int $boosterEvery
  * @return Action
  */
  function setBoosterEvery(int $boosterEvery): Action 
  {
   $this->boosterEvery = $boosterEvery;
   return $this;
  }
  
}