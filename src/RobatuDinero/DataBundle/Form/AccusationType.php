<?php

namespace RobatuDinero\DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccusationType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('published')
            ->add('incident')
            ->add('accused')
            ->add('grade')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RobatuDinero\DataBundle\Entity\Accusation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'robatudinero_databundle_accusation';
    }
}
