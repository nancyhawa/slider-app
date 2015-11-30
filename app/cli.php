<?php
require 'app/puzzle.php';
require 'app/tile.php';

  class CLI {

    public function __construct() {
              $this->puzzle = new Puzzle();
            }

    public function run() {
      $this->puzzle->printBoard();
    }

  }

  (new CLI())->run()
?>
