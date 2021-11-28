<?php

namespace Application\Controller;

use App\Entities\Booking\Aircraft;
use App\Entities\Booking\Airport;
use Doctrine\ORM\EntityManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction(): ViewModel
    {
        $entities = $this->entityManager
            ->getRepository(Airport::class)
            ->findAll();

        print_r($entities);

        return new ViewModel();
    }
}
