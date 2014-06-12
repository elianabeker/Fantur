<?php

namespace Fantur\FanturBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use Fantur\FanturBundle\Entity\Hoteles;
use Fantur\FanturBundle\Entity\Destino;


class AddHotelFieldSubscriber implements EventSubscriberInterface
{
 private $propertyPathToHotel;
 
    public function __construct($propertyPathToHotel)
    {
        $this->propertyPathToHotel = $propertyPathToHotel;
    }
 
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA  => 'preSetData',
            FormEvents::PRE_SUBMIT    => 'preSubmit'
        );
    }
    
    private function addHotelForm($form, $destino_id)
    {
        $formOptions = array(
            'class'         => 'FanturFanturBundle:Hoteles',
            'empty_value'   => 'Hotel',
            'label'         => 'Hotel',
            'attr'          => array(
                'class' => 'hotel_selector',
            ),
            'query_builder' => function (EntityRepository $repository) use ($destino_id) {
                $qb = $repository->createQueryBuilder('hotel')
                    ->innerJoin('hotel.destino', 'destino')
                    ->where('destino.id = :destino')
                    ->setParameter('destino', $destino_id)
                ;
 
                return $qb;
            }
        );
 
        $form->add($this->propertyPathToHotel, 'entity', $formOptions);
    }
    
    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $accessor    = PropertyAccess::createPropertyAccessor();
 
        $hotel        = $accessor->getValue($data, $this->propertyPathToHotel);
        $destino_id = ($hotel) ? $hotel->getDestino()->getId() : null;
 
        $this->addHotelForm($form, $destino_id);
    }
 
    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        $destino_id = array_key_exists('destino', $data) ? $data['destino'] : null;
 
        $this->addHotelForm($form, $destino_id);
    }
    
    
    
    
    
}

?>
