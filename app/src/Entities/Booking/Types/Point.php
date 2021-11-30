<?php

namespace App\Entities\Booking\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class Point extends Type
{
    const TYPE = "point";

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return self::TYPE;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): array
    {
        $split = preg_split("/,/", $value);

        return [
            'longitude' => floatval(ltrim($split[0] ?? '0', '(')),
            'latitude' => floatval(rtrim($split[1] ?? '0', ')'))
        ];
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): string
    {
        $longitude = isset($value['longitude']) && is_float($value['longitude']) ? $value['longitude'] : 0;
        $latitude = isset($value['latitude']) && is_float($value['latitude']) ? $value['latitude'] : 0;

        return "point($longitude, $latitude)";
    }

    public function getName(): string
    {
        return self::TYPE;
    }
}
