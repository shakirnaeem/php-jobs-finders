<?php
    include 'DbContext.php';
    include $relativePath . 'src/mappings/KeywordMapping.php';
    include $relativePath . 'src/interfaces/IRepository.php';

    class KeywordRepository implements IRepository
    {
        public function GetAll($request=null){
            $sql = "SELECT * FROM `job-keyword`";
            if($request != null && $request != '')
                $sql = "SELECT * FROM `job-keyword` WHERE keyword LIKE '% . $request . %'";
            $db = new DbContext();
            $result = $db->ExecuteQuery($sql, "KeywordMapping::map");

            return $result;
        }
        
        public function GetParentKeywords(){
            $sql = "SELECT * FROM `job-keyword` WHERE parent = 0";
            $db = new DbContext();
            $result = $db->ExecuteQuery($sql, "KeywordMapping::map");

            return $result;
        }
        public function GetById($id)
        {
            $sql = "SELECT * FROM `job-keyword` WHERE id = " . $id;
            $db = new DbContext();
            $result = $db->ExecuteQuery($sql, "KeywordMapping::map");
            if(count($result) > 0)
            {
                return $result[0];
            }
            return new KeywordModel();
        }
        public function Add($model)
        {
            $sql = "INSERT INTO `job-keyword` (keyword, parent, active) VALUES('".$model->keyword."', ".$model->parent.", 1)";
            print_r($sql);
            $db = new DbContext();
            $result = $db->ExecuteNonQuery($sql);
            return $result;   
        }
        public function Update($model)
        {
            $sql = "UPDATE `job-keyword` SET keyword = '".$model->keyword."', parent = ".$model->parent." WHERE id = ". $model->id;
            $db = new DbContext();
            $result = $db->ExecuteNonQuery($sql);
            return $result;
        }
        public function Delete($id)
        {
            $sql = "DELETE FROM `job-keyword` WHERE id = ". $id;
            $db = new DbContext();
            $result = $db->ExecuteNonQuery($sql);
            return $result;
        }   
    }
?>