<?php

namespace Library;

class Model
{
    public function call($name)
    {
        require __DIR__ . '/../models/' . $name . '.php';
    }
}
