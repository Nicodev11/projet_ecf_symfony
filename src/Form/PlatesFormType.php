<?php

namespace App\Form;

use App\Entity\Plates;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlatesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false
                ])
            ->add('price', NumberType::class, ['attr' => ['class' => 'form-control']])
            ->add('categories', null , ['attr' => ['class' => 'form-control']])
            ->add('images', FileType::class, [
                'label' => 'images',
                'multiple' => false,
                'mapped' => false,
                'required' => false,
                'attr' => ['class' => 'form-control']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Plates::class,
        ]);
    }
}
