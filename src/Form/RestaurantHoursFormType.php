<?php

namespace App\Form;

use App\Entity\RestaurantHours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RestaurantHoursFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Day', TextType::class, [
                'attr' => ['class' => 'form-control bg-warning text-center text-white fs-3'],
                'label'   => false,
                'disabled' => true
            ])
            ->add('Opening_lunch', TimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('Closing_lunch', TimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
                ])
            ->add('Opening_dinner', TimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
                ])
            ->add('Closing_dinner', TimeType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control']
                ])
            ->add('Closed', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input mx-1'],
                'label' => 'Fermé',
                'required' => false
            ])
            ->add('ClosedDinner', CheckboxType::class, [
                'attr' => ['class' => 'form-check-input mx-1'],
                'label' => 'Fermé',
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RestaurantHours::class,
        ]);
    }
}
