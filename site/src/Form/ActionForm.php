<?php

namespace App\Form;

/* DEFAULT */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
/* FORM */
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('name', TextType::class, array(
                'label' => 'Name',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))

            ->add('delivery_quantity', TextType::class, array(
                'label' => 'Delivery Qauntity',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))
            ->add('delivery_time', TextType::class, array(
                'label' => 'Delivery Time',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))
            
            ->add('rideshare_quantity', TextType::class, array(
                'label' => 'Rideshare Qauntity',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))
            ->add('rideshare_time', TextType::class, array(
                'label' => 'Rideshare Time',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))   

            ->add('rent_quantity', TextType::class, array(
                'label' => 'Rent Qauntity',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))
            ->add('rent_time', TextType::class, array(
                'label' => 'Rent Time',
                'row_attr' => [
                    'class' => 'infield padding-top-twelve'
                ]
            ))
            
            ->add('Submit', SubmitType::class, [
                'label' => 'Save',
                'attr' => array(
                    'class' => 'btn-success'
                )
        ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        // Nothing to add
    }

}
