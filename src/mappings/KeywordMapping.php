<?php
    include $relativePath . 'src/models/KeywordModel.php';

    class KeywordMapping
    {
        public static function Map($data)
        {
            $model = new KeywordModel();
            $model->id = $data["id"];
            $model->keyword = $data["keyword"];
            $model->parent = $data["parent"];
            $model->active = $data["active"];

            return $model;
        }
    }
?>