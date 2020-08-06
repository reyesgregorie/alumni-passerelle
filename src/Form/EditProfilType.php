<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('urlphoto')

            ->add('urlavatar')

            ->add('firstname',
            TextType::class,
                ['label' => 'Prénom'])

            ->add('lastname',
                TextType::class,
                ['label' => 'Nom'])

            ->add('city',
                TextType::class,
                ['label' => 'Ville'])

            ->add('email',
                EmailType::class,
                ['label' => 'Email'])

            ->add('experiences',
                TextareaType::class,
                ['label' => 'Dernières expériences professionnelles'])

            ->add('actual',
                ChoiceType::class,
                [
                    'placeholder' => 'Oui ou Non',
                    'choices'=>
                        [
                            'Oui' => true,
                            'Non' => false
                        ]
                ])

            ->add('companyname',
                TextareaType::class,
                ['label' => 'Nom de l\'entreprise actuelle et le poste occupé'])

            ->add('bio',
                TextareaType::class,
                ['label' => 'Décris toi Moussaillon!'])

            ->add('urllinkedin',
                TextType::class,
                ['label' => 'URL LinkedIn'])

            ->add('urlportfolio',
                TextType::class,
                ['label' => 'URL Portfolio'])

            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
