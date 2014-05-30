<?php

namespace Fantur\FanturBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * PaquetesType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class PaquetesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaIda')
            ->add('fechaVuelta')
            ->add('precio')
            ->add('fechaExpiracion')
            ->add('transporte')
            ->add('destino')
            ->add('hotel')
            ->add('eventos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fantur\FanturBundle\Entity\Paquetes'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fantur_fanturbundle_paquetes';
    }
}
