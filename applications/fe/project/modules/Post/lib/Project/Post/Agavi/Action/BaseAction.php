<?php

namespace Project\Post\Agavi\Action;

use Pulq\Agavi\Action\BaseAction as PulqBaseAction;

class BaseAction extends PulqBaseAction
{
    public function isSecure()
    {
        return false;
    }
}

