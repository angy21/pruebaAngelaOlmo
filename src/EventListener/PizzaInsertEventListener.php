<?php 
namespace App\EventListener;

use App\Entity\Pizza;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class PizzaInsertEventListener
{
    //Este evento controla que al persistir un objeto Pizza se añada el valor al campo createdAt
    public function prePersist(LifecycleEventArgs $event): void
    {
        $pizza = $event->getObject();

        // Comprobación para que el objeto sea una instancia de la clase Pizza
        if (!$pizza instanceof Pizza) {
            return;
        }

        // Establecer la fecha actual en el campo createdAt si aún no está definido
        if ($pizza->getCreatedAt() === null) {
            $pizza->setCreatedAt(new \DateTime());
        }
    }
}