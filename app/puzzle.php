<?php
  class Puzzle {
    public function __construct() {
      $this->empty = new Tile("", 3, 3, $this);
      $this->board = $this->buildBoard();
            }

    public function buildBoard() {
      $numbers = range(1, 15);
      shuffle($numbers);
      $puzzle_array = array();

      $row = 0;
      while ($row <= 3){
        array_push($puzzle_array, $this->buildRow(array_splice($numbers, 0, 4), $row));
        $row++;
      }
      $puzzle_array[3][3] = $this->empty;
      return $puzzle_array;
    }

    public function buildRow($tile_nums, $row_num) {
      $column = 0;
      $row = array();
      while ($column <= count($tile_nums) - 1) {
        array_push($row, new Tile($tile_nums[$column], $row, $column, $this));
        $column++;
      }
      return $row;
    }

    public function printBoard(){
      foreach ($this->board as $row){
        foreach ($row as $tile) {
          if ($tile === $this->empty){
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

    public function in_order(){
      $numbers_array = array_map("number", ($this->flattened_board()));
      !! ($numbers_array == asort($numbers_array));
    }

    function flattened_board() {
      $return = array();
      array_walk_recursive($this->board, function($a) use (&$return) { $return[] = $a; });
      return $return;
    }
  }



?>
