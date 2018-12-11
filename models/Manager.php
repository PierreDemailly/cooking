<?php 
class Manager 
{
  private $db;

    
  public function __construct()
  {
    $this->setDb(Database::DB());
  }

  /**
   * Get the value of db
   */ 
  public function getDb()
  {
    return $this->db;
  }

  /**
   * Set the value of db
   *
   * @return  self
   */ 
  public function setDb($db)
  {
    $this->db = $db;

    return $this;
  }
}
