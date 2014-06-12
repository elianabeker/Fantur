<?php
namespace Fantur\FanturBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
 
class AddDestinoFieldSubscriber implements EventSubscriberInterface
{
    private $propertyPathToHotel;
 
    public function __construct($propertyPathToHotel)
    {
        $this->propertyPathToHotel = $propertyPathToHotel;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT   => 'preSubmit'
        );
    }
 
    private function addDestinoForm($form, $destino = null)
    {
        $formOptions = array(
            'class'         => 'FanturFanturBundle:Destinos',
            'mapped'        => false,
            'label'         => 'Destino',
            'empty_value'   => 'Destino',
            'attr'          => array(
                'class' => 'destino_selector',
            ),
        );
 
        if ($destino) {
            $formOptions['data'] = $destino;
        }
 
        $form->add('destino', 'entity', $formOptions);
    }
 
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor = PropertyAccess::getPropertyAccessor();
 
        $hotel    = $accessor->getValue($data, $this->propertyPathToHotel);
        $destino = ($hotel) ? $hotel->getDestino(): null;
 
        $this->addDestinoForm($form, $destino);
    }
 
    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();
 
        $this->addDestinoForm($form);
    }
}

?>
