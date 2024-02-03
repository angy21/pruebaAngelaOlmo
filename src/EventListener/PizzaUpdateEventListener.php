<?php 
namespace App\EventListener;

use App\Entity\Pizza;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class PizzaUpdateEventListener
{
    // Este evento se encarga de añadir el valor al campo updatedAt cuando un objeto Pizza se va a actualizar
    public function preUpdate( PreUpdateEventArgs $event): void
    {
        
        $pizza = $event->getObject();
        // Comprobación para que el objeto sea una instancia de la clase Pizza
        if (!$pizza instanceof Pizza) {
            return;
        }

        // Establecemos la fecha actual en el campo updatedAt
        $pizza->setUpdatedAt(new \DateTime());
    }
}
