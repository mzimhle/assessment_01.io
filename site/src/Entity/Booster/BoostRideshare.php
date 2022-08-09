<?php

namespace App\Entity\Booster;

use App\Entity\Rideshare;
use App\Entity\Implement\Booster;
use App\Entity\MappedSupperclass\AbstractionAction;

/**
 * Main rideshare class for all it's boosters
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class BoostRideshare implements Booster {

    /**
     *
     * Current booster.
     * NOTE: Each action can be part of only one booster
     *  
     * @return int
     */
    public static function currentBooster(Object $rideshare): int
    {
        self::checkObject($rideshare);
        return self::FiveInEightBooster($rideshare);
    }

    /**
     *  Check if the object given is of specific object
     *  
     * @throws Exception
     */
    public static function checkObject(Object $rideshare): bool
    {
        if($rideshare instanceof Rideshare) return true;
        // Throw exception if there is a wrong object
        throw new \RuntimeException(sprintf('Method "%s::%s" parameter must be instanceof "App\Entity\Rideshare".', __CLASS__, __METHOD__));
    }
    
    /**
     * Check dates if the dates 
     *  
     * @return int
     */
    public static function checkDates(\DateTime $date, array $boosterActiveDates): bool {

        foreach($boosterActiveDates as $from => $to) {

            $start = new \DateTime($from);
            $end = new \DateTime($to);

            if (($date->getTimestamp() >= $start->getTimestamp()) && ($date->getTimestamp() <= $end->getTimestamp())) {
                return true;
            }

        }

        return false;
    }

    /**
     * Booster 1
     *
     * 5 rideshares in 8 hours result in 10 additional points.
     *  
     * @return int
     */
    public static function FiveInEightBooster(Rideshare $rideshare): int {
        // Days allowed to give booster
        $boosterActiveDates = [
            '2022-01-01' => '2022-01-31',
            '2022-06-03' => '2022-06-31'       
        ];

        if($rideshare->getBoosterAllowed() && self::checkDates($rideshare->date, $boosterActiveDates)) {
            if($rideshare->getBoosterEvery() !== 0 && $rideshare->getTime() !== 0 && 
                ((int)($rideshare->getTime() / $rideshare->getBoosterEvery())) > 0) {
                    return $rideshare->getBoosterPoint();
            }
        }
        return 0;
    }
    
}