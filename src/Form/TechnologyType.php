<?php

namespace App\Form;

use App\Entity\Technology;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class TechnologyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('logo', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'accept' => '.jpg,.jpeg,.png',
                ],
                'constraints' => [
                    new Assert\File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/jpg'
                        ],
                        'mimeTypesMessage' => 'Formats acceptés : JPG, PNG, PDF.',
                    ]),
                ],
            ])
            ->add('version');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Technology::class,
        ]);
    }
}
