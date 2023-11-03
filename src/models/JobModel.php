<?php
    class JobModel
    {
        public $id;
        public $title;
        public $ad_type;
        public $ad_date;
        public $ad_detail;
        public $ad_source;
        public $positions;
        public $locations;
        public $keywords;
        public $active;

        public function map($data)
        {
            $this->id = $data["id"];
            $this->title = $data["title"];
            $this->ad_type = $data["ad_type"];
            $this->ad_date = $data["ad_date"];
            $this->ad_detail = $data["ad_detail"];
            $this->ad_source = $data["ad_source"];
            $this->positions = $data["positions"];
            $this->locations = $data["locations"];
            $this->keywords = $data["keywords"];
            $this->active = $data["active"];
        }
    }
?>