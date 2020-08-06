<?php

namespace App\Form;

use App\Entity\Users;
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
            ->add('firstname',
            TextType::class,
                [
                'label' => 'prénom'
                ])

            ->add('lastname',
                TextType::class,
                [
                'label' => 'nom'
                ])


            ->add('city',
                TextType::class,
                [
                'label' => 'ville'
                ])
            ->add('email',
                EmailType::class,
                [
                    'label' => 'email'
                ])

            ->add('urlphoto')
            ->add('urlavatar')



            ->add('experiences')
            ->add('actual')


            ->add('bio',
                TextType::class,
                [
                    'label' => 'bio'

                 ])
            ->add('companyname')
            ->add('urllinkedin')
            ->add('urlportfolio')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
