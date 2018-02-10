<?php

namespace AppBundle\Form;

use AppBundle\Entity\Festival;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
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
        if ($options['type'] == 'edit') {
            $builder->add('isCancelled', TextType::class, array(
                'label' => 'Cancelled?',
                'required' => false
            ));
        }

        $builder
            ->add('festival', EntityType::class, array(
                'class' => Festival::class,
                'label' => false
            ))
            ->add('start', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array(
                    'class' => 'datepicker',
                    'data-date-format' => 'yyyy-MM-dd'
                )
            ))
            ->add('end', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                'attr' => array(
                    'class' => 'datepicker',
                    'data-date-format' => 'yyyy-MM-dd'
                )
            ))
            ->add('timestart', DateTimeType::class, array(
                'label' => 'Start Time',
                'widget' => 'single_text',
                'mapped' => false,
                'attr' => array(
                    'class' => 'timepicker',
                )
            ))
           ->add('timeend', DateTimeType::class, array(
                'label' => 'End Time',
                'widget' => 'single_text',
                'mapped' => false,
                'attr' => array(
                    'class' => 'timepicker'
                )
            ))
            ->add('artist', ArtistType::class)
            ->add('location', LocationType::class, array(
                'required' => false,
            ))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Concert',
            'type' => false
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
