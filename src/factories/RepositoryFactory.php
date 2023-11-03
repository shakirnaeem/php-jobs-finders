<?php
    include $relativePath . 'src/repositories/JobRepository.php';
    class RepositoryFactory
    {
        public static function CreateRepository($type) {
            $repo;
            switch($type)
            {
                case 'job':
                    $repo = new JobRepository();
                    break;
            }

            return $repo;
        }
    }
?>