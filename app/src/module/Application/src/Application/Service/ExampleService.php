<?php

namespace Application\Service;

class ExampleService implements IService
{
    public function getName(): string
    {
        return "Example service";
    }
}
