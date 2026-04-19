<?php

namespace App\components\TodoCard;


enum TaskStatus: int
{
  case Done = 1;
  case Planned = 0;
  case Pending = -1;
  public function getLabel(): string
  {
    return match ($this) {
      self::Done => "Done",
      self::Planned => "Planned",
      self::Pending => "Pending"
    };
  }
}



class TodoCard
{

  // title, status, desc, id

  public function __construct(
    private string $title,
    private string $status,
    private string $desc,
    private int $id
  ) {
    $statusEnum = TaskStatus::from($this->status);
    $this->status = $statusEnum->getLabel();
    $this->title = htmlspecialchars($this->title);
    $this->status = htmlspecialchars($this->status);
    $this->desc = htmlspecialchars($this->desc);
    $this->id = htmlspecialchars($this->id);
  }


  public function createCard()
  {
    // In der createCard() Methode
    $card = <<<CARD
  <div class='card'>
    <div class='cardHead'>
      <small><b>$this->status</b></small>
      <h3>$this->title</h3>
    </div>
    <div class='cardBody'>
      <p>$this->desc</p>
    </div>
    <div class='cardFooter'>
      <div class='button-grp'>
        <form action="" method="post"><button type="submit" name="pending" value="$this->id">Wait</button></form>
        <form action="" method="post"><button type="submit" name="delete" value="$this->id">Del</button></form>
        <form action="" method="post"><button type="submit" name="done" class='btn-done' value="$this->id">Done</button></form>
      </div>
    </div>
  </div>
CARD;
    return $card;
  }
}
