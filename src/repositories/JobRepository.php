<?php
    include 'DbContext.php';
    include $relativePath . 'src/mappings/JobMapping.php';
    include $relativePath . 'src/interfaces/IRepository.php';

    class JobRepository implements IRepository
    {
        public function GetAll($request=null){
            $sql = "SELECT * FROM job";
            if($request != null && $request != '')
                $sql = "SELECT * FROM job WHERE keywords LIKE '% . $request . %'";
            $db = new DbContext();
            $result = $db->ExecuteQuery($sql, "JobMapping::map");

            return $result;
        }
        public function GetById($id)
        {
            $sql = "SELECT * FROM job WHERE id = " . $id;
            $db = new DbContext();
            $result = $db->ExecuteQuery($sql, "JobMapping::map");
            if(count($result) > 0)
            {
                return $result[0];
            }
            return new JobModel();
        }
        public function Add($model)
        {

        }
        public function Update($model)
        {

        }
        public function Delete($id)
        {

        }   
    }
?>