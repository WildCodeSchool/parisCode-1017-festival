<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class WishlistType
 *
 * @package AppBundle\Form
 */
class WishlistType extends AbstractType
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
            ->add('user')
            ->add('festival')
            ->add('genre')
            ->add('location')
            ->add('artist');
    }/**
      * {@inheritdoc}
      *
      * @param OptionsResolver $resolver
      */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
            'data_class' => 'AppBundle\Entity\Wishlist'
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
        return 'appbundle_wishlist';
    }


}
