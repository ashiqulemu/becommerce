<?php
namespace App;



Class quizAnswer
{
    public $radio;
    public $id;
    public function __construct($radio, $id){
        $this->radio=$radio;
        $this->id=$id;

        }
}