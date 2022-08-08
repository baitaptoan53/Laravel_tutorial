<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CourseStatus extends Enum
{
    public const Draft = 0;
    public const Published = 1;
    public const Archived = 2;
    public const Pending_Review = 3;
    public static function getArrayView(): array
    {
        return [
            'Draft'  => self::Draft,
            'Published'  => self::Published,
            'Archived' => self::Archived,
            'Pending Review' => self::Pending_Review,
        ];
    }
}
