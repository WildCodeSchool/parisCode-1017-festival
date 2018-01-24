<?php

namespace AppBundle\Form;

use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Validator\Constraints\NotBlank;
use AppBundle\Entity\Location;
use AppBundle\Entity\Genre;

class FestivalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'label' => 'Title',
                'attr' => array(
                    'id' => 'icon_prefix',
                    'type' => 'text',
                    'class' => 'validate',
                    'data-length' => '30'
                )
            ))
            ->add('description', TextareaType::class, array(
                'label' => 'Description',
                'attr' => array(
                    'id' => 'text-area',
                    'class' => 'materialize-textarea validate',
                    'data-length' => '1000'
                )
            ))
            ->add('location', LocationType::class)
            ->add('genre', GenreType::class)
            ->add('budget', NumberType::class, array(
                'label' => 'Amount',
                'attr' => array(
                    'id' => 'icon_prefix',
                    'type' => 'number'
                )
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
//            ->add('start', DateTimeType::class, array(
//                'widget' => 'single_text',
//                'input' => 'datetime',
//                'required' => 'false',
//                'format' => 'YYYY-MM-dd HH:mm',
//                'attr' => array(
//                    'data-date-format' => 'YYYY-MM-DD HH:mm',
//                    'readonly' => false,
//                    'placeholder' => 'YYYY-MM-DD HH:mm'
//                )
//            ))
//            ->add('end', DateTimeType::class, array(
//                'widget' => 'single_text',
//                'input' => 'datetime',
//                'required' => 'false',
//                'format' => 'YYYY-MM-dd HH:mm',
//                'attr' => array(
//                    'data-date-format' => 'YYYY-MM-DD HH:mm',
//                    'readonly' => false,
//                    'placeholder' => 'YYYY-MM-DD HH:mm'
//                )
//            ))
            ->add('linkWebsite', UrlType::class, array(
                'label' => 'Official website',
                'attr' => array(
                    'id' => 'icon_prefix',
                ),
                'required' => false
            ))
            ->add('linkFbPage', UrlType::class, array(
                'label' => 'Facebook page',
                'attr' => array(
                    'id' => 'icon_prefix'
                ),
                'required' => false
            ))
            ->add('linkFbEvent', UrlType::class, array(
                'label' => 'Facebook event',
                'attr' => array(
                    'id' => 'icon_prefix'
                ),
                'required' => false
            ))
            ->add('linkInstagram', UrlType::class, array(
                'label' => 'Instagram',
                'attr' => array(
                    'id' => 'icon_prefix'
                ),
                'required' => false
            ))
            ->add('imageIcon', UrlType::class, array(
                'label' => 'Icon image',
                'attr' => array(
                    'id' => 'icon_prefix'
                ),
                'required' => false
            ))
            ->add('imageBanner', UrlType::class, array(
                'label' => 'Banner image',
                'attr' => array(
                    'id' => 'icon_prefix'
                ),
                'required' => false
            ))
            ->add('isCancelled', TextType::class)
           ;

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Festival'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_festival';
    }


}
