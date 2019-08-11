<?php

namespace App\Entity;

class Search {

    public $gouvernorat;
    public $region;
    public $type;

    /**
     * @return mixed
     */
    public function getGouvernorat()
    {
        return $this->gouvernorat;
    }

    /**
     * @param mixed $gouvernorat
     */
    public function setGouvernorat($gouvernorat): void
    {
        $this->gouvernorat = $gouvernorat;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region): void
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }





}