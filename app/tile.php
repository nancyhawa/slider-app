<?php
require 'app/puzzle.php';

  class Tile {

    private $_tiles = []

    public function __construct($number, $row, $column, $puzzle) {
              $this->number = $number;
              $this->row = $row;
              $this->column = $column;
              $this->puzzle = $puzzle;
              array_push($tiles, $this);
            }

    public static function find_by_id($id){
      foreach ($_tiles as $tile){
        return $tile if $tile.num == $id;
      }
    }

    public function adjacent?($tile) {
      !!($tile.row == this.row || $tile.column = this.column);
    }

    public function swap($tile) {
      $saved_row = $this->row
      $saved_column = $this->column
      $this->row = $this->puzzle->empty->row
      $this->column = $this->puzzle->empty->column
      $this->puzzle->empty->row = $saved_row
      $this->puzzle->empty->column = $saved_column
    }

  }


?>
