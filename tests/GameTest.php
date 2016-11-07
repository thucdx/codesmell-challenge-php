<?php
namespace tests;

require_once __DIR__ . "/../GameRunner.php";

class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $players list of players
     * @param $rolls roll number for each turn
     * @param $answer answer outcome for each turn
     * @param $expectedWinner expected winner for given game arrangement
     * @throws \Exception
     */
    public function testGameRunner($players, $rolls, $answer, $expectedWinner)
    {
        $this->assertEquals($expectedWinner, \GameRunner::run($players, $rolls, $answer));
    }

    public function dataProvider()
    {
        $playerNames = ["Thuc", "Tu", "Viet"];

        return [
            [   $playerNames,
                [2, 1, 4, 2, 1, 2, 4, 5, 1, 3, 1, 4, 5, 5, 3, 2, 1, 5, 4, 3, 2, 5, 2, 2, 2, 5, 2, 2, 5, 3, 2, 3, 2, 4, 5, 5, 2, 4, 1, 1, 1, 2, 3, 2, 2, 1, 3, 5, 5, 3, 3, 2, 4, 2, 2, 2, 3, 5, 3, 5, 4, 3, 4, 4, 3, 2, 5, 3, 1, 2, 4, 1, 1, 1, 3, 2, 2, 1, 1, 5, 2, 1, 4, 4, 3, 2, 2, 5, 2, 2, 4, 1, 2, 1, 1, 3, 4, 1, 3, 2, 2, 1, 3, 1, 5, 5, 5, 1, 5, 3, 2, 4, 4, 3, 2, 4, 3, 3, 2, 1, 1, 3, 4, 1, 3, 3, 4, 5, 4, 3, 1, 5, 2, 3, 4, 5, 5, 1, 4, 5, 4, 2, 2, 3, 5, 1, 3, 3, 1, 1, 4, 5, 2, 4, 2, 5, 3, 4, 2, 5, 1, 4, 4, 5, 2, 4, 5, 4, 2, 4, 5, 1, 4, 1, 4, 3, 1, 3, 3, 2, 4, 1, 3, 2, 1, 3, 2, 1, 5],
                [false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, true, false, false, false, false, true, false, false, false, true, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, true, false, false, false, false, false, false, false, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, true, false, true, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, true],
                $playerNames[2]
            ],
            [
                $playerNames,
                [4, 4, 5, 1, 3, 3, 2, 4, 5, 2, 3, 4, 2, 4, 2, 4, 5, 1, 4, 5, 3, 1, 3, 3, 2, 1, 2, 3, 4, 3, 3, 2, 3, 3, 4, 2, 5, 3, 1, 2, 2, 5, 1, 2, 2, 2, 5, 1, 3, 5, 4, 2, 4, 5, 1, 4, 3, 2, 1, 5, 2, 3, 4, 1, 5, 4, 1, 5, 2, 2, 4, 5, 3, 1, 3, 5, 5, 4, 4, 4, 2, 2, 1, 4, 4, 4, 2, 5, 4, 2, 3, 5, 3, 4, 2, 1, 1, 5, 5, 4, 4, 2, 3, 5, 4, 2, 2, 1, 3, 1, 4, 5, 5, 3, 2, 2, 1, 1],
                [true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, true, true, false, false, false, false, false, false, false, false, false, true, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, true],
                $playerNames[0]
            ],
            [
                $playerNames,
                [3, 2, 3, 3, 1, 3, 5, 1, 1, 4, 3, 5, 3, 3, 4, 1, 2, 4, 3, 5, 5, 4, 5, 1, 5, 3, 1, 2, 2, 1, 3, 1, 2, 4, 3, 1, 5, 2, 2, 2, 3, 5, 1, 4, 2, 3, 4, 5, 1, 5, 2, 3, 2, 5, 1, 3, 2, 5, 4, 2, 4, 2, 1, 4, 4, 2, 3, 3, 1, 4, 4, 1, 1, 5, 4, 1, 5, 3, 5, 4, 5, 5, 1, 2, 2, 5, 1, 5, 2, 1, 4, 5, 2, 2, 3, 3, 2, 2, 5, 3, 5, 2, 5, 5, 4, 1, 4, 2, 5, 1, 3, 4, 5, 1, 5, 4, 4, 5, 1, 4, 3, 5, 4, 3, 5, 4, 3, 4, 3, 4, 4, 5, 5, 1, 5, 4, 3, 5, 5, 2, 1, 5, 4, 5, 2, 5, 5, 3, 1, 2, 2, 1, 5, 4, 5, 3, 3, 2, 3, 5, 2, 2, 3, 5, 2, 4, 2, 1, 4, 1],
                [false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, true, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, true, false, false, false, true, true, true, false, false, false, false, false, false, false, false, true, true, false, false, false, false, false, false, false, false, true, true, false, false, false, true, true, true, false, false, false, false, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, true, false, false, false, false, false, false, false, false, false, true, false, true, true, true, false, true, false, false, false, false, false, false, false, false, false, false, false, false, true],
                $playerNames[1]
            ]
        ];
    }

}

