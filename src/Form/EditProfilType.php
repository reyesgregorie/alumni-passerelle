<?php

namespace App\Form;

use App\Entity\Users;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
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
            ->add('role')

            ->add('city',
                TextType::class,
                [
                'label' => 'ville'
                ])
            ->add('email',
                TextType::class,
                [
                    'label' => 'email'
                ])
            ->add('urlphoto',

                [

                ])
            ->add('urlavatar')
            ->add('promotion')
            ->add('experiences')
            ->add('actual')
            ->add('bio')
            ->add('companyname')
            ->add('urllinkedin')
            ->add('urlportfolio')
            ->add('password')
            ->add('dateCreate')
            ->add('dateUpdate')
            ->add('event')
            ->add('group')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
