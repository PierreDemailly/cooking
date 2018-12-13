<?php
/**
 * Class representing an Entity
 */
class Entity
{
  use Hydrator;

  public function __construct($data)
  {
    $this->hydrate($data);
  }
}
