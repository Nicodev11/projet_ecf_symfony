<?php

namespace App\Form;

use App\Entity\Users;
use PharIo\Manifest\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email as ConstraintsEmail;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('lastname', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('phone', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control'],
                ])
            ->add('RGPDConsent', CheckboxType::class, [
                'attr' => ['class' => 'ms-2'],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should be accepted ...'
                    ]),
                ],
            ])
            ->add('plainPassword',  RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes saisis ne sont pas identiques.',
                'options' => ['attr' => ['autocomplete' => 'new-password', 'class' => 'form-control']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation du mot de passe'],
                'mapped' => false,
                'constraints' => [
                    new Regex([
                        'pattern' => '"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"',
                        'message' => 'Votre mot de passe doit comporter au minimum 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spècial'
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
