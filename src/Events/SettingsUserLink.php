<?php

namespace App\Events;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;

class SettingsUserLink implements EventSubscriberInterface{

    private $security;

    public function __construct(Security $security){
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return[
            KernelEvents::VIEW => ['setCustomerForUser', EventPriorities::PRE_VALIDATE]
        ];
    }

    public function setCustomerForUser(ViewEvent $event){
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if($user instanceof User && $method === "POST"){
            $user->setCustomer($this->security->getUser()->getCustomer());
            $user->setRoles(['ROLE_USER']);
        }
    }
}
