<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entrez votre prénom',
                ],
                'constraints' => [

                    new Assert\Length([
                        'max' => 30,
                        'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('lastname', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entrez votre nom',
                ],
                'constraints' => [

                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\Email([
                        'message' => 'L\'adresse email "{{ value }}" n\'est pas valide.',
                        'mode' => 'html5',
                    ]),
                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'L\'adresse email ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre adresse email',
                ],
            ])
            ->add('password', PasswordType::class, [
                'constraints' => [ new Assert\Length([
                    'min' => 8,
                    'max' => 20,
                    'minMessage' => 'Le mot de passe doit contenir au moins {{ limit }} caractères.',
                    'maxMessage' => 'Le mot de passe ne peut pas dépasser {{ limit }} caractères.',
                ]),
                    new Assert\Regex([
                        'pattern' => '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/',
                        'message' => 'Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, et un caractère spécial.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Entrez un mot de passe sécurisé',
                ],

            ])
            ->add('telephone', TextType::class, [
                'mapped' => false,
                'required' => true,
                'label' => 'Téléphone',
                'constraints' => [
                    new Assert\NotBlank([
                        'message' => 'Le numéro de téléphone est obligatoire.',
                    ]),
                    new Assert\Regex([
                        'pattern' => '/^\+?[0-9]{10,15}$/',
                        'message' => 'Le numéro de téléphone doit être valide. Il peut inclure un "+" suivi de 10 à 15 chiffres.',
                    ]),
                    new Assert\Length([
                        'max' => 15,
                        'maxMessage' => 'Le numéro de téléphone ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone',
                ],
            ])
            ->add('birthdayDate', BirthdayType::class, [
                'label' => 'Date de naissance',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
