<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\GroupSequenceProviderInterface;

/**
 * Class ActionDTO
 * @package App\DTO
 * @Assert\GroupSequenceProvider()
 */
class ActionDTO implements GroupSequenceProviderInterface
{
    /**
     * @Assert\NotBlank    
     * @Assert\Regex(pattern="/^([a-zA-Z' -]+)$/", message="Please make sure only letters, spaces and hyphens are entered")
     * @var string
     */
    public $name;

    /**
     * @Assert\NotBlank
     * @Assert\Type(type="string")
     * @Assert\Regex(pattern="/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", message="Please add a valid date with format YYYY-MM-DD.")     
     * @var string
     */
    public $date;

    /**
     * @Assert\NotBlank    
     * @Assert\Type( type="integer", message="Please only numbers" )
     * @var int
     */
    public $delivery_quantity;

    /**
     * @Assert\NotBlank    
     * @Assert\Type( type="integer", message="Please only numbers" )
     * @var int
     */
    public $delivery_time;

    /**
     * @Assert\NotBlank    
     * @Assert\Type( type="integer", message="Please only numbers" )
     * @var int
     */
    public $rideshare_quantity;

    /**
     * @Assert\NotBlank    
     * @Assert\Type( type="integer", message="Please only numbers" )
     * @var int
     */
    public $rideshare_time;

    /**
     * @Assert\NotBlank    
     * @Assert\Type( type="integer", message="Please only numbers" )
     * @var int
     */
    public $rent_quantity;

    /**
     * @Assert\NotBlank
     * @Assert\Type( type="integer", message="Please only numbers" )
     * @var int
     */
    public $rent_time;
    
    /**
     * @return array
     */
    public function getGroupSequence(): array
    {
        return ['ActionDTO', 'Strict', 'Default'];
    }

}