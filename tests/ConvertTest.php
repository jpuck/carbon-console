<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use jpuck\CarbonConsole\Commands\Convert;

class ConvertTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        date_default_timezone_set('America/Chicago');
    }

    public function argumentDataProvider()
    {
        return [
            [
                'input' => [
                    'time-in' => ['2017-02-16 22:00'],
                ],
                'expected' => '2017-02-16T22:00:00-06:00 America/Chicago',
            ],
            [
                'input' => [
                    'time-in' => ['2017-02-16', '22:00', 'UTC'],
                ],
                'expected' => '2017-02-16T16:00:00-06:00 America/Chicago',
            ],
            [
                'input' => [
                    'time-in' => ['6:00PM', '2017-02-16'],
                    '--format-out' => 'Y-m-d g:iA',
                ],
                'expected' => '2017-02-16 6:00PM',
            ],
            [
                'input' => [
                    'time-in' => ['6:00PM', '2017-02-16'],
                    '--timezone-out' => 'Antarctica/Casey',
                    '--format-out' => 'Y-m-d h:iA',
                ],
                'expected' => '2017-02-17 11:00AM',
            ],
            [
                'input' => [
                    'time-in' => ['2017-02-16', '22:00', 'UTC'],
                    '--timezone-out' => 'Antarctica/Casey',
                    '--format-out' => 'Y-m-d g:iA',
                ],
                'expected' => '2017-02-17 9:00AM',
            ],
        ];
    }

    /**
     *  @dataProvider argumentDataProvider
     */
    public function testCanConvertTimezonesAndFormats(array $input, string $expected)
    {
        $app = new Application;
        $app->add(new Convert);
        $cmd = $app->find('convert');

        $cmdTester = new CommandTester($cmd);
        $cmdTester->execute($input);
        $actual = $cmdTester->getDisplay();

        $this->assertSame($expected.PHP_EOL, $actual);
    }
}
