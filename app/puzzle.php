<?php
require 'app/tile.php';

  class Puzzle {
    public function __construct() {
      $this->empty = new Tile("", 3, 3)
            }

    public function buildPuzzle() {
      $numbers = range(1, 15);
      shuffle($numbers);
      $puzzle_array = ()

      $row = 0;
      while ($row <= 4){
        array_push($puzzle_array, buildRow(arr_splice($numbers, 0, 4), $row))
        $row++
      }
      $puzzle_array[3][3] = $empty
      return $puzzle_array
    }

    public function buildRow($tile_nums, $row_num) {
      $column = 0;
      $row = array();
      while ($column <= count($tile_nums)) {
        array_push($row, new Tile($tile_nums[$column], $row, $column));
        $column++
      }
      return $row
    }
  }


?>
