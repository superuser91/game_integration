<?php

namespace Vgplay\GameIntegration\Exceptions;

use Exception;

class MissingCharacterConfiguration extends Exception
{
    public function __construct($message = 'Thiếu thông tin cấu hình danh sách nhân vật.')
    {
        parent::__construct($message);
    }
}
