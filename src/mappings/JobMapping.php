<?php
    include $relativePath . 'src/models/JobModel.php';

    class JobMapping
    {
        public static function Map($data)
        {
            $model = new JobModel();
            $model->id = $data["id"];
            $model->title = $data["title"];
            $model->ad_type = $data["ad_type"];
            $model->ad_date = $data["ad_date"];
            $model->ad_detail = $data["ad_detail"];
            $model->ad_source = $data["ad_source"];
            $model->positions = $data["positions"];
            $model->locations = $data["locations"];
            $model->keywords = $data["keywords"];
            $model->active = $data["active"];

            return $model;
        }
    }
?>