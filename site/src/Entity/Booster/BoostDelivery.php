<?php

namespace App\Entity\Booster;

use RuntimeException;
use DateTime;
use App\Entity\Delivery;
use App\Entity\Implement\Booster;
use App\Entity\MappedSupperclass\AbstractionAction;

/**
 * Main delivery class for all it's boosters
 *
 * @since        1.0.0
 * @author       Mzimhle Mosiwe <mzimhle.mosiwe@gmail.com>
 * @copyright    Copyright (c) 2022, Mzimhle Mosiwe
 *
 */

class BoostDelivery implements Booster {

    /**
     *
     * Current booster.
     * NOTE: Each action can be part of only one booster
     *
     */
    public static function currentBooster(Object $delivery): int
    {
        self::checkObject($delivery);
        return self::FiveInTwoBooster($delivery);
    }

    /**
     *  Check if the object given is of specific object
     *  
     * @throws Exception
     */
    public static function checkObject(Object $delivery): bool
    {
        if($delivery instanceof Delivery) return true;
        
        // Throw exception if there is a wrong object
        throw new RuntimeException(sprintf('Method "%s::%s" parameter must be instanceof "App\Entity\Delivery".', self::class, __METHOD__));
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
     * 5 deliveries in 2 hours result in 5 additional points.
     *
     */
    public static function FiveInTwoBooster(Delivery $delivery): int {
        // Days allowed to give booster
        $boosterActiveDates = [
            '2022-01-01' => '2022-01-31',
            '2022-06-03' => '2022-06-31'       
        ];

        if($delivery->getBoosterAllowed() && self::checkDates($delivery->date, $boosterActiveDates) && ($delivery->getBoosterEvery() !== 0 && $delivery->getTime() !== 0 && 
            ((int)($delivery->getTime() / $delivery->getBoosterEvery())) > 0)) {
            return $delivery->getBoosterPoint();
        }
        
        return 0;
    }
    
}