<?php
/**
 * Created in PhpStorm
 * User: iphpweb
 * Date: 17.06.2020
 * Time: 23:11
 */
declare(strict_types=1);

namespace App\Interfaces;

/**
 * Interface InnValidatorInterface
 * @package App\Interfaces
 */
interface InnValidatorInterface
{
    /**
     * @param $inn
     * @return bool
     */
    public function isValid ($inn) : bool;
}