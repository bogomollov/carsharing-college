<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ArendatorsType extends Enum
{
    const deleted = -1;
    const blocked = 0;
    const frozen = 1;
    const active = 2;
}
