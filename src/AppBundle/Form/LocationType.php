<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class LocationType
 *
 * @package AppBundle\Form
 */
class LocationType extends AbstractType
{
    /**
     * {@inheritdoc}
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'address', TextType::class, array(
                'label' => 'Location',
                'label_attr' => array(
                    'class' => 'active'),
                'required' => false,
                'attr' => array(
                    'onFocus' => 'geolocate()',
                    'type' => 'text',
                    'autocomplete' => 'off'
                ))
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
            'data_class' => 'AppBundle\Entity\Location'
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
        return 'appbundle_location';
    }

}
