<?php

namespace Vgplay\GameIntegration\Exceptions;

use Exception;

class MissingServerConfiguration extends Exception
{
    public function __construct($message = 'Thiếu thông tin cấu hình danh sách server.')
    {
        parent::__construct($message);
    }
}
