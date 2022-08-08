<?php

namespace App\Form;

/* DEFAULT */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/* FORM */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
/* VALIDATION */
use Symfony\Component\Validator\Constraints as Constraints;

/**
 * Form for the actions.
 *	
 */
class ActionForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array('label' => 'Name'))
            ->add('delivery_quantity', IntegerType::class, array('label' => 'Delivery Qauntity'))
            ->add('delivery_time', IntegerType::class, array('label' => 'Delivery Time'))
            ->add('rideshare_quantity', IntegerType::class, array('label' => 'Rideshare Qauntity'))
            ->add('rideshare_time', IntegerType::class, array( 'label' => 'Rideshare Time' ))   
            ->add('rent_quantity', IntegerType::class, array( 'label' => 'Rent Qauntity' ))
            ->add('rent_time', IntegerType::class, array( 'label' => 'Rent Time' ))
            ->add('Submit', SubmitType::class, [ 'label' => 'Save'  ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        // Nothing to add
    }

}
