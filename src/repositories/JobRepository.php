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
            $sql = "INSERT INTO job (ad_date, ad_source, ad_type, title, positions, locations, keywords, ad_detail) 
                    VALUES('".$model->ad_date."', ".$model->ad_source.", ".$model->ad_type.",'".$model->title."', '".$model->positions."', '".$model->locations."', '".$model->keywords."', '".$model->ad_detail."')";
            $db = new DbContext();
            $result = $db->ExecuteNonQuery($sql);
            return $result;   
        }
        public function Update($model)
        {
            $sql = "UPDATE job SET 
                ad_date = '".$model->ad_date."',
                ad_source = ".$model->ad_source.",
                ad_type = ".$model->ad_type.",
                title = '".$model->title."',
                positions = '".$model->positions."',
                locations = '".$model->locations."',
                keywords = '".$model->keywords."',
                ad_detail = '".$model->ad_detail."'
                WHERE id = ". $model->id;
            $db = new DbContext();
            $result = $db->ExecuteNonQuery($sql);
            return $result;
        }
        public function Delete($id)
        {
            $sql = "DELETE FROM job WHERE id = ". $id;
            $db = new DbContext();
            $result = $db->ExecuteNonQuery($sql);
            return $result;
        } 
    }
?>