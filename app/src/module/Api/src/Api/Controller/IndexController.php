<?php

namespace Api\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    public function indexAction(): JsonModel
    {
        return new JsonModel([
            'status'=> 'success',
            'field' => 'Any value',
        ]);
    }
}
