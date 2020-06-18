<?php
/**
 * Created in PhpStorm
 * User: iphpweb
 * Date: 18.06.2020
 * Time: 11:16
 */
declare(strict_types=1);

use App\Classes\InnValidator;
use PHPUnit\Framework\TestCase;

class InnValidatorTest extends TestCase
{
    protected $_class;

    public function setUp(): void
    {
        $this->_class = new InnValidator();
    }

    public function tearDown(): void
    {
        $this->_class = null;
    }

    /**
     * @dataProvider inn_samples
     * @param int $inn
     * @param bool $res
     * @return void
     */
    public function testIsValid($inn, $res)
    {
        $checkedInn = $this->_class->isValid($inn);
        $this->assertSame($res, $checkedInn);
    }

    public function inn_samples () {
        return array(
            [100000000074, true],
            [100010000002, true],
            [100010010032, true],
            [969944000024, true]
        );
    }
}
