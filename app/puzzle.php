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

    public function find_tile_by_id($id){
      foreach ($this->flattened_board() as $tile){
        if ($tile->number == $id){
          return $tile;
        }
      }
    }

    public function buildRow($tile_nums, $row_num) {
      $column = 0;
      $row = array();
      while ($column <= count($tile_nums) - 1) {
        array_push($row, new Tile($tile_nums[$column], $row_num, $column, $this));
        $column++;
      }
      return $row;
    }

    public function in_order(){
      if (!function_exists('get_number')){
        function get_number($tile){
          return $tile->number;
        }
      }
      $numbers_array = array_map("get_number", ($this->flattened_board()));
      !! ($numbers_array == asort($numbers_array));
    }

    function flattened_board() {
      $return = array();
      array_walk_recursive($this->board, function($a) use (&$return) { $return[] = $a; });
      return $return;
    }
  }



?>
