<?php
require 'app/puzzle.php';
require 'app/tile.php';

  class CLI {

    public function __construct() {
              $this->puzzle = new Puzzle();
            }

    public function run() {
      while (!($this->puzzle->in_order())){
        $this->printBoard();
        $choice = $this->getUserChoice();
        $tile = $this->puzzle->find_tile_by_id($choice);

        if (! ($tile)){
          echo "That is not a valid choice.  Please enter the number of a tile.\n";
        }elseif ($tile->is_adjacent()){
          $tile->swap();
        }else {
          echo "That is tile is not adjacent to the empty space.\nChoose a tile that is directly beside, above, or below the empty space.\n";
        }
      }
      echo "You won!  All of the tiles are in order!\n";
      $this->printBoard;
    }

    public function printBoard(){
      foreach ($this->puzzle->board as $row){
        foreach ($row as $tile) {
          if ($tile === $this->puzzle->empty){
            echo "|  ";
          }elseif ($tile->number < 10) {
            echo "| " . $tile->number;
          } else {
            echo "|" . $tile->number;
          }
        }
        echo "| \n";
      }
    }

    public function getUserChoice() {
      $line = readline("Which tile would you like to move?\n");
      return $line;
    }
  }

  (new CLI())->run()
?>
