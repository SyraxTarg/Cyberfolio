<?php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Diplome', null, [
                'empty_data' => '',
                'constraints' => [
                    new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                ]),
                    ]

            ])
            ->add('Etablissement', null, [
                'empty_data' => '',
                'constraints' => [
                    new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                ]),]

            ])
            ->add('Lieu', null, [
                'empty_data' => '',
                'constraints' => [
                    new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                ]),]

            ])
            ->add('Date', null, [
                'widget' => 'single_text',
                'empty_data' => '',
            ])
            ->add('Description',  TextareaType::class, [
                'empty_data' => '',
                'constraints' => [
                    new Assert\Length([
                    'max' => 255,
                    'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                ]),]

            ])
            ->add('_delete', HiddenType::class, [
                'mapped' => false,
                'required' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}
