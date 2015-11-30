class SquareFactory {

  public static function create_from_id($make, $model)
    {
        return new Automobile($make, $model);
    }

}
