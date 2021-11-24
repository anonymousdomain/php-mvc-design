<?php

namespace app\core\exception;

use Exception;

class UnAuth extends Exception
{

    protected $message = 'you don\'t have permission to access this page';

    protected $code = 403;
}
