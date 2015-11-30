<?php
  class Tile {

    public function __construct($number, $row, $column, $puzzle) {
              $this->number = $number;
              $this->row = $row;
              $this->column = $column;
              $this->puzzle = $puzzle;
            }

    public function is_adjacent() {
      return !! ($this->row == $this->puzzle->empty->row || $this->column == $this->puzzle->empty->column);
    }

    public function swap() {
      $tile_row = $this->row;
      $tile_column = $this->column;
      $empty_row = $this->puzzle->empty->row;
      $empty_column = $this->puzzle->empty->column;

      $this->row = $empty_row;
      $this->column = $empty_column;

      $this->puzzle->empty->row = $tile_row;
      $this->puzzle->empty->column = $tile_column;

      $this->puzzle->board[$empty_row][$empty_column] = $this;
      $this->puzzle->board[$tile_row][$tile_column] = $this->puzzle->empty;
    }
  }
?>
