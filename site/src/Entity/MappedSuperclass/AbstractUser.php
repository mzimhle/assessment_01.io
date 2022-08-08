<?php

namespace App\Entity\MappedSuperclass;

/**
 * Abstract class for the user.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

abstract class AbstractUser {

  /** @var string */  
  protected $name;

 /**
  * Construct - Set default values
  *
  * @param string $name
  *
  * @return void
  */
  function __construct(string $name) {
    $this->name = $name;
  }
 /**
  * @return string
  */
  function getName(): string
  {
   return $this->name;
  }
  
 /**
  * @param string $name
  * @return User
  */
  function setName(string $name): User 
  {
   $this->name = $name;
   return $this;
  }

}