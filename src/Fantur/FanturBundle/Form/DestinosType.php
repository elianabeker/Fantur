<?php

namespace Fantur\FanturBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * DestinosType form.
 * @author Nombre Apellido <name@gmail.com>
 */
class DestinosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('pais')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fantur\FanturBundle\Entity\Destinos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'fantur_fanturbundle_destinos';
    }
}
