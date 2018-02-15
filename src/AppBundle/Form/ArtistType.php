<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ArtistType
 *
 * @package AppBundle\Form
 */
class ArtistType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name', TextType::class, array(
            'label' => 'Artist'
            )
        );

    }/**
      * {@inheritdoc}
      *
      * @param OptionsResolver $resolver
      */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => 'AppBundle\Entity\Artist'
            )
        );
    }

    /**
     * {@inheritdoc}
     *
     * @return null|string
     */
    public function getBlockPrefix()
    {
        return 'appbundle_artist';
    }


}
