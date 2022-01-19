<?php

namespace Vgplay\GameIntegration\Exceptions;

use Exception;

class GameNotFoundException extends Exception
{
    public function __construct($message = 'Không tìm thấy Game từ ID được cung cấp.')
    {
        parent::__construct($message);
    }
}
