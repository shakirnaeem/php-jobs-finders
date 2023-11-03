<?php
    interface IRepository {
        public function GetAll($request=null);
        public function GetById($id);
        public function Add($model);
        public function Update($model);
        public function Delete($id);
    }
?>