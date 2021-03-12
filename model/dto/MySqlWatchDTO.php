<?php


namespace cleevio\model\dto;


final class MySqlWatchDTO extends DTO
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var int
     */
    public $price;

    /**
     * @var string
     */
    public $description;

    /**
     * MySqlWatchDTO constructor.
     * @param int $id
     * @param string $title
     * @param int $price
     * @param string $description
     */
    public function __construct($id, $title, $price, $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->description = $description;
    }

    public function toArray()
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'price'         => $this->price,
            'description'   => $this->description,
        ];
    }
}