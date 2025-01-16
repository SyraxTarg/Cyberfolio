<?php
namespace App\Form;


use App\Entity\Profile;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options['user'];

        $builder
            ->add('profilePicture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'accept' => '.jpg,.jpeg,.png',
                ],
            ])
            ->add('prenom', TextType::class, [
                'mapped' => false,
                'data' => $user ? $user->getFirstName() : '',
                'required' => true,
                'label' => 'Prenom',
                'constraints' => [

                    new Assert\Length([
                        'max' => 30,
                        'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('nom', TextType::class, [
                'mapped' => false,
                'data' => $user ? $user->getLastName() : '',
                'required' => true,
                'label' => 'Nom',
                'constraints' => [

                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'Ne peut pas dépasser {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('telephone', TextType::class, [
                'mapped' => true,
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
            ])
            ->add('competences', CollectionType::class, [
                'entry_type' => CompetencesType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'mapped' => true,
                'required' => false,
                'by_reference' => false,
            ])
            ->add('formations', CollectionType::class, [
                'entry_type' => FormationType::class,
                'mapped' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                ])
            ->add('experiences', CollectionType::class, [
                'entry_type' => ExperiencesType::class,
                'mapped' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' =>false
            ])
            ->add('centresInterets', CollectionType::class, [
                'entry_type' => CentresInteretsType::class,
                'mapped' => true,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profile::class,
            'user' => null,
        ]);
    }
}
