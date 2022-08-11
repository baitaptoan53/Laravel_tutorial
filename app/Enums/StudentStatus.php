<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class StudentStatus extends Enum
{
   public const Studying =   0;
   public const Leave =   1;
   public static function getArrayView(): array
   {
       return [
           'Studying'  => self::Studying,
           'Leave'  => self::Leave,
       ];
       
   }


   public static function getKeyByValue($value): string
   {
       return array_search($value, self::getArrayView(), true);
   }
}
