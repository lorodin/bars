<?php

namespace Application\Controller;

use Application\Service\IService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private IService $service;

    public function __construct(IService $service)
    {
        $this->service = $service;
    }

    public function indexAction(): ViewModel
    {
        return new ViewModel([
            "name" => $this->service->getName()
        ]);
    }
}
