<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use \Symfony\Component\Form\Extension\Core\Type\TextType;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',
                TextType::class,
                [
                    'label'=> 'Prénom'
                ])
            ->add('lastname',
                TextType::class,
                [
                    'label'=> 'Nom',
                ])
            ->add('role', ChoiceType::class,
                [
                    'placeholder'=>'Choisissez un rôle',
                    'choices'=>
                        [
                            'Admin' => 'ROLE_ADMIN',
                            'Étudiant' => 'ROLE_USER',
                            'Alumni' => 'ROLE_USER',
                            'Staff' => 'ROLE_ADMIN',
                            'Formateur' => 'ROLE_USER'
                        ]
                ])
            ->add('promotion', ChoiceType::class,
                [
                    'placeholder'=>'Choisissez une promotion',
                    'choices'=>
                        [
                            'Aurora' => 'Aurora',
                            'Polaris' => 'Polaris',
                            'Zéphyr' => 'Zéphyr'
                        ]
                ])
            ->add('city',
                TextType::class,
                [
                    'label'=> 'Ville'
                ])
            ->add('email',
                EmailType::class,
                [
                    'label'=>'Email'
                ])
            ->add('urlavatar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
