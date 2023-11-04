<?php
    class KeywordModel
    {
        public $id;
        public $keyword;
        public $parent;
        public $active;

        public function map($data)
        {
            $this->id = $data["id"];
            $this->keyword = $data["keyword"];
            $this->parent = $data["parent"];
            $this->active = $data["active"];
        }
    }
?>