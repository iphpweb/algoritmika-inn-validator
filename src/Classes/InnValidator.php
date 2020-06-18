<?php
/**
 * Created in PhpStorm
 * User: iphpweb
 * Date: 17.06.2020
 * Time: 23:14
 */
declare(strict_types=1);

namespace App\Classes;

use App\Interfaces\InnValidatorInterface;

/**
 * Class InnValidator
 * @package App\Classes
 */
class InnValidator implements InnValidatorInterface
{
    /**
     * @var array
     */
    private $inn_10 = [2, 4, 10, 3, 5, 9, 4, 6, 8, 0];
    /**
     * @var array
     */
    private $inn_11 = [7];
    /**
     * @var array
     */
    private $inn_12 = [3];

    /**
     * @var string
     */
    private $inn_string;

    /**
     * InnValidator constructor.
     */
    public function __construct ()
    {
    }

    /**
     * @param $inn
     * @return bool
     */
    public function isValid ($inn): bool
    {
        $this->inn_string = str_split((string) $inn);

        $inn_length = count($this->inn_string);

        switch ($inn_length) {
            case 10:
                $n_10 = $this->calculateControlNumber($this->inn_10);
                if ($n_10 !== (int) $this->inn_string[9]) {
                    return false;
                }
                break;

            case 12:
                $n_11 = $this->calculateControlNumber(array_merge($this->inn_11, $this->inn_10));
                if ($n_11 !== (int) $this->inn_string[10]) {
                    return false;
                }

                $n_12 = $this->calculateControlNumber(array_merge($this->inn_12, $this->inn_11, $this->inn_10));
                if ($n_12 !== (int) $this->inn_string[11]) {
                    return false;
                }
                break;
        }

        /** if no errors so far then INN is good */
        return true;
    }

    /**
     * @param array $coefs
     * @return int
     */
    private function calculateControlNumber (array $coefs): int
    {
        $sum = 0;

        foreach ($coefs as $idx => $coef) {
            $sum += $coef * (int) $this->inn_string[$idx];
        }

        return $sum % 11 % 10;
    }
}