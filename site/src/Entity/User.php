<?php

namespace App\Entity;

use App\Entity\MappedSuperclass\AbstractUser;

/**
 * Main class for the user.
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class User extends AbstractUser {
 
    /**
     * Construct - Set default values
     *
     * @param string $name
     *
     * @return void
     */
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    /**
     *
     * Return name of the user should object need to be converted to a string.
     *  
     * @return string
     */
    public function __toString(): string
    {
        return ucwords(strtolower((sprintf('Name of user is: %s', $this->name))));
    }

}