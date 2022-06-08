<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CourseType extends Enum
{
    const Regular =   0;
    const Fail = 1;
    const Imporvment=2;
    public static function getDescription($value): string
    {
        if ($value === self::Regular) {
            return 'Regular/Drop';
        }
        elseif($value==self::Fail){
            return 'Fail/Imporvement';
        }elseif($value==self::Imporvment){
          return 'Non Credit';
        }
        return parent::getDescription($value);
    }
}
