<?php

namespace App\Form;

use App\Entity\Menus;
use App\Entity\Plates;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('description', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'form-control']
                ])
            ->add('entries1', TextareaType::class,  ['attr' => ['class' => 'form-control']])
            ->add('entries2', TextareaType::class,  [
                'required' => false,
                'attr' => ['class' => 'form-control']
                ])
            ->add('dishe1', TextareaType::class,  ['attr' => ['class' => 'form-control']])
            ->add('dishe2', TextareaType::class,  [
                'required' => false,
                'attr' => ['class' => 'form-control']
                ])
            ->add('dessert1', TextareaType::class,  ['attr' => ['class' => 'form-control']])
            ->add('dessert2', TextareaType::class,  [
                'required' => false,
                'attr' => ['class' => 'form-control']
                ])
            ->add('price', NumberType::class , ['attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menus::class,
        ]);
    }
}
