<?php

namespace Migrations\Abstracts;

interface DumpTypesDefinitions
{
    const NULLABLE        = 0x000001;
    const STRING_FORMAT   = 0x000010;
    const JSON_FORMAT     = 0x000100;
    const NUMBER_FORMAT   = 0x001000;
    const POINT_FORMAT    = 0x010000;
    const DATETIME_FORMAT = 0x100000;
}
