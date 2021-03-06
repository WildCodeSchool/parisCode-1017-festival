<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class GenreType
 *
 * @package AppBundle\Form
 */
class GenreType extends AbstractType
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
            'label' => 'Genre',
            'attr' => array(
                'type' => 'search',
                'id' => 'appbundle_festival_genre',
                'class' => 'autocomplete-genre',
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
            'data_class' => 'AppBundle\Entity\Genre'
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
        return 'appbundle_genre';
    }


}
