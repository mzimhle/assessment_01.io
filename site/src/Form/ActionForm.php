<?php

namespace App\Form;

/* DEFAULT */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/* FORM */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
/* VALIDATION */
use Symfony\Component\Validator\Constraints as Constraints;

/**
 * Form for the actions.
 *	
 */
class ActionForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['label' => 'Name', 'data' => 'Name Surname'])
            ->add('date', TextType::class, ['label' => 'Date of actions', 'data' => '2022-01-12'])            
            ->add('delivery_quantity', IntegerType::class, ['label' => 'Deliveries made', 'data' => 7])
            ->add('delivery_time', IntegerType::class, ['label' => 'Delivery hours it took', 'data' => 2])
            ->add('rideshare_quantity', IntegerType::class, ['label' => 'Rideshares made', 'data' => 3])
            ->add('rideshare_time', IntegerType::class, ['label' => 'Rideshare made in hours', 'data' => 4])   
            ->add('rent_quantity', IntegerType::class, ['label' => 'Number of rented books', 'data' => 1])
            ->add('rent_time', IntegerType::class, ['label' => 'Days Books were rented', 'data' => 3])
            ->add('Submit', SubmitType::class, [ 'label' => 'Save'  ]);
    }

    public function configureOptions(OptionsResolver $resolver): void {
        // Nothing to add
    }

}
