<?php

namespace Model\Entity;

use App\AbstractEntity;

class User extends AbstractEntity
{
  private $id;
  private $pseudonym;
  private $password;
  private $dateRegistration;
  private $email;
  private $status;
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
   * Get the value of pseudonym
   */
  public function getPseudonym()
  {
    return $this->pseudonym;
  }

  /**
   * Set the value of pseudonym
   *
   * @return  self
   */
  public function setPseudonym($pseudonym)
  {
    $this->pseudonym = $pseudonym;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of dateRegistration
   */
  public function getDateRegistration()
  {
    return $this->dateRegistration;
  }

  /**
   * Set the value of dateRegistration
   *
   * @return  self
   */
  public function setDateRegistration($dateRegistration)
  {
    $this->dateRegistration = $dateRegistration;

    return $this;
  }

  /**
   * Get the value of email
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of status
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set the value of status
   *
   * @return  self
   */
  public function setStatus($status)
  {
    $this->status = $status;

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
