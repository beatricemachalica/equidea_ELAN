<?php

namespace Model\Entity;

use App\AbstractEntity;

class Theme extends AbstractEntity
{
  private $id;
  private $title;
  private $imgPath;

  public function __construct($data)
  {
    parent::hydrate($data, $this);
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of imgPath
   */
  public function getImgPath()
  {
    return $this->imgPath;
  }

  /**
   * Set the value of imgPath
   *
   * @return  self
   */
  public function setImgPath($imgPath)
  {
    $this->imgPath = $imgPath;

    return $this;
  }
}
