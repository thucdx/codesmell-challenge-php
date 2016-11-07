<?php

include __DIR__.'/Game.php';

class GameRunner {
  public static function run($playerNames, $rolls, $answer) {
    $totalPlayer = count($playerNames);

    if ($totalPlayer <= 1 || $totalPlayer > 6 ) {
      throw new Exception("Invalid game! Number of players must be in range[2, 6]");
    }

    $totalRoll = count($rolls);
    $totalAnswer = count($answer);

    if ($totalRoll < 1 || $totalRoll != $totalAnswer) {
      throw new Exception("Number of rolls and answer must equals, and must not be zero!");
    }

    $game = new Game;
    $notYetWinner = false;

    foreach ($playerNames as $playerName)
      $game->add($playerName);

    $id = 0;

    do {
      $game->roll($rolls[$id]);
      if (!$answer[$id]) {
        $notYetWinner = $game->wrongAnswer();
      } else {
        $notYetWinner = $game->wasCorrectlyAnswered();
      }
    } while (++$id < $totalRoll && $notYetWinner);

    return $game->getWinnerName();

  }

  public static function randomGame() {
    $notAWinner = true;

    $aGame = new Game();

    $aGame->add("Chet");
    $aGame->add("Pat");
    $aGame->add("Sue");


    do {

      $aGame->roll(rand(0,5) + 1);

      if (rand(0,9) == 7) {
        $notAWinner = $aGame->wrongAnswer();
      } else {
        $notAWinner = $aGame->wasCorrectlyAnswered();
      }



    } while ($notAWinner);
  }
}

GameRunner::randomGame();
