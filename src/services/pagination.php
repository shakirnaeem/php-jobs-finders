<?php
    function paginate($response, $currentPage){
        $pageResult = "";
        
        $dataCount = $response["count"];
        $totalPage = ceil($dataCount / $_ENV["PAGE_SIZE"]);
        $prevClass = $currentPage == 1 ? 'page-item disabled' : 'page-item';
        $nextClass = $currentPage == $totalPage ? 'page-item disabled' : 'page-item';
        $prevPage = $currentPage == 1 ? "" : generatePageUrl($currentPage, $currentPage-1);
        $nextPage = $currentPage == $totalPage ? "" : generatePageUrl($currentPage, $currentPage+1);
        
        if($totalPage > 1 && $currentPage > 0){
            $pageResult .= '<ul class="pagination">
                    <li class="'.$prevClass.'"><a class="page-link" href="'.$prevPage.'">Previous</a></li>';
            for($i = 1; $i <= $totalPage; $i++){
                $pageClass = $currentPage == $i ? "page-item active" : "page-item";
                $pageUrl = $currentPage == $i ? "" : generatePageUrl($currentPage, $i);
                $pageResult .= '<li class="'.$pageClass.'"><a class="page-link" href="'.$pageUrl.'">'.$i.'</a></li>';    
            }
            $pageResult .= '<li class="'.$nextClass.'"><a class="page-link" href="'.$nextPage.'">Next</a></li>
                </ul>';
        }

        return $pageResult;
    }

    function generatePageUrl($currentPage, $newPage){
        $currentUri = $_SERVER['REQUEST_URI'];
        $newUri = str_ireplace("page=" . $currentPage, "page=" . $newPage, $currentUri);

        return $_ENV['HOST'] . $newUri;
    }
?>