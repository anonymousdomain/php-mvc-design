<?php

namespace app\core\exception;

use Exception;

class NotFoundException extends Exception
{

    protected $code = 404;
    protected $message = 'page not found';
}
