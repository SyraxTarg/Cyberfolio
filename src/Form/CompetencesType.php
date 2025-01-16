<?php

namespace App\Form;

use App\Entity\Competence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class CompetencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('competence', null, [
                'empty_data' => '',
                'constraints' => [
                    new Assert\Length([
                    'max' => 100,
                    'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                ]),
                    ]

            ])
            ->add('hard_skill')
            ->add('_delete', HiddenType::class, [
                'mapped' => false,
                'required' => false,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Competence::class,
        ]);
    }
}
