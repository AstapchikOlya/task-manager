<?php

class Model {

    public function getConnection()
    {
        return DB::getInstance();
    }

}
