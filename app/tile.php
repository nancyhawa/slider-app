<?php
  class Tile {

    private $tiles = array();

    public function __construct($number, $row, $column, $puzzle) {
              $this->number = $number;
              $this->row = $row;
              $this->column = $column;
              $this->puzzle = $puzzle;
              array_push($this->tiles, $this);
            }

    public static function find_by_id($id){
      foreach ($this->tiles as $tile){
        if ($tile.num == $id){
          return $tile;
        }
      }
    }

    public function is_adjacent() {
      !! ($this->row == $this->puzzle->empty->row || $this->column == $this->puzzle->empty->column);
    }

    public function swap() {
      $tile_row = $this->row;
      $tile_column = $this->column;
      $empty_row = $this->puzzle->empty->row;
      $empty_column = $this->puzzle->empty->column;

      $this->row = $empty_row;
      $this->column = $empty_column;

      $this->puzzle->board[$tile_row][$tile_column] = $this->puzzle->empty;
      $this->puzzle->board[$empty_row][$empty_column] = $this;
    }

  }


?>
