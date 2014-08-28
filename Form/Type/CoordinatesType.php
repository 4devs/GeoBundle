<?php
namespace FDevs\GeoBundle\Form\Type;

use FDevs\GeoBundle\Form\DataTransformer\CoordinatesTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class CoordinatesType extends AbstractType
{

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $constraints = [
            new Assert\Type(['type' => 'numeric']),
        ];
        if ($options['required']) {
            $constraints[] = new Assert\NotBlank();
        }
        $builder
            ->add(
                'lat',
                'text',
                [
                    'constraints' => array_merge(
                        $constraints,
                        [new Assert\Range(['min' => -90, 'max' => 90])]
                    ),
                    'attr' => ['placeholder' => 'form.lat'],
                    'label' => 'form.lat',
                    'required' => $options['required'],
                    'label_attr' => ['class' => 'sr-only']
                ]
            )
            ->add(
                'lng',
                'text',
                [
                    'constraints' => array_merge(
                        $constraints,
                        [new Assert\Range(['min' => -180, 'max' => 180])]
                    ),
                    'label' => 'form.lng',
                    'attr' => ['placeholder' => 'form.lng'],
                    'required' => $options['required'],
                    'label_attr' => ['class' => 'sr-only']
                ]
            )
            ->addModelTransformer(new CoordinatesTransformer());
    }

    /**
     * {@inheritDoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(['translation_domain' => 'FDevsGeoBundle', 'required' => true]);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'fdevs_geo_coordinates';
    }
}
