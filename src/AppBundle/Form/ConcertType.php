<?php

namespace AppBundle\Form;

use AppBundle\Entity\Festival;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ConcertType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('festival', EntityType::class, array(
                'class' => Festival::class,
                'label' => false
            ))
            ->add('dateStart', DateTimeType::class, array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'required' => false,
                'format' => 'YYYY-MM-dd HH:mm',
                'attr' => array(
                    'data-date-format' => 'YYYY-MM-DD HH:mm',
                    'readonly' => false,
                    'placeholder' => 'YYYY-MM-DD HH:mm'
                )
            ))
            ->add('dateEnd', DateTimeType::class, array(
                'widget' => 'single_text',
                'input' => 'datetime',
                'required' => false,
                'format' => 'YYYY-MM-dd HH:mm',
                'attr' => array(
                    'data-date-format' => 'YYYY-MM-DD HH:mm',
                    'readonly' => false,
                    'placeholder' => 'YYYY-MM-DD HH:mm'
                )
            ))
            ->add('artist', ArtistType::class)
            ->add('location', LocationType::class, array(
                'required' => false,
            ))
            ->add('isCancelled', TextType::class, array(
                'label' => 'Cancelled?',
                'required' => false
            ))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Concert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_concert';
    }


}
