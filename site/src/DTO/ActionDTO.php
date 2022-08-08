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
     * @Assert\Length(min = 1, max = 5, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 5 strings or less"
        )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    public $delivery_quantity;

    /**
     * @Assert\NotBlank    
     * @Assert\Length(min = 1, max = 5, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 5 strings or less"
        )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    public $delivery_time;

    /**
     * @Assert\NotBlank    
     * @Assert\Length(min = 1, max = 5, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 5 strings or less"
        )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    public $rideshare_quantity;

    /**
     * @Assert\NotBlank    
     * @Assert\Length(min = 1, max = 5, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 5 strings or less"
        )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    public $rideshare_time;

    /**
     * @Assert\NotBlank    
     * @Assert\Length(min = 1, max = 5, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 5 strings or less"
        )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    public $rent_quantity;

    /**
     * @Assert\NotBlank    
     * @Assert\Length(min = 1, max = 5, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 5 strings or less"
        )
     * @Assert\Type(
     *     type="integer",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     * @var int
     */
    public $rent_time;

    /**
     * @Assert\NotBlank    
     * @Assert\Length(min = 1, max = 100, 
            minMessage = "Please make sure the length is more than 0", 
            maxMessage = "Please make sure the length is 100 strings or less"
        )
     * @Assert\Regex(pattern="/^[a-zA-Z\s+\-]$/", message="Please make sure only letters, spaces and hyphens are entered")
     * @var string
     */
    public $name;
    
    /**
     * @return array
     */
    public function getGroupSequence(): array
    {
        return ['ActionDTO', 'Strict', 'Default'];
    }

}