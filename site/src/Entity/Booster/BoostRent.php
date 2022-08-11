<?php

namespace App\Entity\Booster;

use RuntimeException;
use DateTime;
use App\Entity\Rent;
use App\Entity\Implement\Booster;
use App\Entity\MappedSupperclass\AbstractionAction;

/**
 * Main rent class for all it's boosters
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class BoostRent implements Booster {

    /**
     *
     * Current booster.
     * NOTE: Each action can be part of only one booster
     *
     */
    public static function currentBooster(Object $rent): int
    {
        self::checkObject($rent);
        return self::GetBooster();
    }

    /**
     *  Check if the object given is of specific object
     *  
     * @throws Exception
     */
    public static function checkObject(Object $rent): bool
    {
        if($rent instanceof Rent) return true;
        
        // Throw exception if there is a wrong object
        throw new RuntimeException(sprintf('Method "%s::%s" parameter must be instanceof "App\Entity\Rent".', self::class, __METHOD__));
    }
    
    /**
     * Check dates if the dates 
     *
     */
    public static function checkDates(DateTime $date, array $boosterActiveDates): bool {

        foreach($boosterActiveDates as $from => $to) {

            $start = new DateTime($from);
            $end = new DateTime($to);

            if (($date->getTimestamp() >= $start->getTimestamp()) && ($date->getTimestamp() <= $end->getTimestamp())) {
                return true;
            }
        }
        
        return false;
    }

    /**
     * Booster 1
     *
     * Rent has no boosters.
     *
     */
    public static function GetBooster(): int {
        // There are no defined boosters.
        return 0;
    }
    
}