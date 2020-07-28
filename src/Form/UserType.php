<?php

namespace App\Form;

use App\Entity\Users;
use Doctrine\DBAL\Types\TextType;
use PhpParser\Node\Stmt\Label;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',

                TextType::class,
                [
                    'label'=> 'firtname'
                ]



            )
            ->add('lastname',
                TextType::class,
                [
                    'label'=> 'lastname'
                ]



            )
            ->add('role')

            ->add('city',
                TextType::class,
                [
                    'label'=> 'role'
                ]



            )
            ->add('email',
                EmailType::class,
                [
                    'label'=>'Email'
                ]




            )


            ->add('urlphoto')
            ->add('urlavatar')


            ->add('promotion',
                TextType::class,
                [
                    'label'=>'promotion'
                ]







            )


            ->add('experiences',
                TextareaType::class,
                [
                    'label'=> 'experiences'
                ]


            )
            ->add('actual')

            ->add('bio',
                TextareaType::class,
                [
                    'label'=>'contenu'
                ]



            )
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
