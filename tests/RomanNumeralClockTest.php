<?php
declare(strict_types=1);

use Carbon\Carbon;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class RomanNumeralClockTest extends TestCase
{
    /** @var MockObject */
    private $carbonMock;

    /** @var MockObject */
    private $numberToNumeralConverter;

    /** @var RomanClock */
    private $sut;

    public function setUp(): void
    {
        parent::setUp();
        $this->carbonMock = $this->getMockBuilder(Carbon::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->numberToNumeralConverter = $this->getMockBuilder(NumberToNumeralConverter::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut = new RomanClock($this->carbonMock, $this->numberToNumeralConverter);
    }

    /**
     * @test
     * @dataProvider hourCases
     */
    public function itCanConvertHalfSixToVII($hour, $minute, $expectedHour, $expectedNumeral)
    {
        $this->carbonMock
            ->method('__get')
            ->will($this->onConsecutiveCalls($hour, $minute));

        $this->numberToNumeralConverter->expects(self::once())
            ->method('getNumeral')
            ->willReturn($expectedNumeral);

        $this->numberToNumeralConverter->expects(self::once())
            ->method('setNumber')
            ->with($expectedHour);

        $result = $this->sut->getHourNumeral();

        $this->assertEquals($result, $expectedNumeral);
    }

    public function hourCases()
    {
        return [
            '6:30:00 returns VII' => [
                'hour' => 6,
                'minute' => 30,
                'expectedHour' => 7,
                'expectedNumeral' => 'VII'
            ],
            '12:30:00 returns I' => [
                'hour' => 12,
                'minute' => 30,
                'expectedHour' => 1,
                'expectedNumeral' => 'I'
            ],
            '13:30:00 returns II' => [
                'hour' => 13,
                'minute' => 30,
                'expectedHour' => 2,
                'expectedNumeral' => 'II'
            ]
        ];
    }


}