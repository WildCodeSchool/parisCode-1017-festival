<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
            ->add('username', TextType::class, array(
                'label' => 'Username',
                'attr' => array(
                    'id' => 'icon_prefix',
                    'type' => 'text',
                    'class' => 'validate',
                    'data-length' => '30'
                )))
            ->add('email', EmailType::class, array(
                'label' => 'Username',
                'attr' => array(
                    'id' => 'icon_prefix',
                    'type' => 'text',
                    'class' => 'validate',
                    'data-length' => '30'
                )))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'required' => true,
                'attr' => array(
                    'id' => 'icon_prefix',
                    'type' => 'text',
                    'class' => 'validate',
                    'data-length' => '30'),
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),))
            ->add('address', LocationType::class)
            ->add('imageIcon', TextType::class, array(
                'label' => 'Your picture',
                'attr' => array(
                    'id' => 'icon_prefix',
                    'type' => 'text',
                    'class' => 'validate',
                    'data-length' => '30'
                )))
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

    public function getName()
    {
        return 'app_user_account';

    }

}
