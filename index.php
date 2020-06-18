<?php
/**
 * Created in PhpStorm
 * User: iphpweb
 * Date: 17.06.2020
 * Time: 23:45
 */
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\InnValidator;

$arTests = [
    100000000074,
    100010000002,
    100010010032,
    969944000024
];

echo 'starting ... <br>';
foreach ($arTests as $inn) {
    //var_dump((new InnValidator())->isValid($inn));
    echo $inn . ' - ' . ((new InnValidator())->isValid($inn) ? 'true' : 'false') . '<br>';
}
echo 'done.';