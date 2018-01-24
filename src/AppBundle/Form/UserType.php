<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('usernameCanonical', TextType::class)
            ->add('email', EmailType::class)
            ->add('emailCanonical', TextType::class)
            ->add('enabled', TextType::class)
            ->add('salt', TextType::class)
            ->add('plainPassword', TextType::class)
            ->add('lastLogin', DateTimeType::class)
            ->add('confirmationToken', TextType::class)
            ->add('password', PasswordType::class)
//            ->add('groups', TextType::class)
//            ->add('roles', TextType::class)
            ->add('passwordRequestedAt', DateTimeType::class)
            ->add('address', LocationType::class)
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'app_user_registration';

    }

}
