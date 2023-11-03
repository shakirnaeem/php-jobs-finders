<?php
    include $relativePath . 'src/factories/RepositoryFactory.php';
    //include $relativePath . 'src/models/JobModel.php';
    
    $data = new JobModel();
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {
        $jobRepository = RepositoryFactory::CreateRepository('job');
        $data = $jobRepository->GetById($_GET['id']);
    }
    $adSourceList = ['', 'Jang', 'The News', 'Dawn', 'Nawa-i-Waqt', 'Express', 'The Nation'];

    $totalPositions = 0;
    if (isset($data->positions)) {
        $positionsList = explode("\n", $data->positions);
        if (count($positionsList) > 0)
        {
            $totalPositions = count(array_filter($positionsList, function ($x) {
                if (stripos($x, "===") === false) {
                    return $x;
                }
            }));
        }
    }

    $positionData = array();
    if ($data->positions) {
        $positionsList = explode("\n", $data->positions);
        foreach($positionsList as $item) {
            if (stripos($item, "===") === false) {
                $positionItems = explode(" ", $item);
                if (count($positionItems) >= 2 && is_numeric($positionItems[0])) {
                    $positionData[] = [ 
                            "title" => str_ireplace($positionItems[0], " ", $item), 
                            "count" => trim($positionItems[0]),
                            "type" => "data" 
                    ];
                }
                else 
                {
                    $positionData[] = [ "title" => $item, "count" => "", "type" => 'data' ];
                }
            }
            else {
                $positionItems = explode("===", $item);
                if (count($positionItems) >= 2)
                    $positionData[] = [ "title" => trim($positionItems[1]), "count" => 0, "type" => 'head' ];
            }
        }
    }
?>
<div class="col-md-10 col-sm-12 col-xs-12 float-right main">
    <h4 class="ml-3 mr-3 border-bottom pb-2 mt-3"><?= $data->title ?></h4>
    <div class="row m-0">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="border-bottom pb-2 text-app2">Job Details</h5>
                            <div class="d-flex border-bottom pt-2 pb-2 mb-2">
                                <div class="mr-auto">Date</div>
                                <div class="badge badge-app p-2"><?=$data->ad_date ?></div>
                            </div>
                            <div class="d-flex border-bottom pt-2 pb-2 mb-2">
                                <div class="mr-auto">Newspaper</div>
                                <div class="badge badge-app p-2"><?=$adSourceList[$data->ad_source] ?></div>
                            </div>
                            <div class="d-flex border-bottom pt-2 pb-2 mb-2">
                                <div class="mr-auto">Location</div>
                                <div class="badge badge-app p-2"><?=$data->locations?></div>
                            </div>
                            <div class="d-flex border-bottom pt-2 pb-2 mb-2">
                                <div class="mr-auto">Total Posts</div>
                                <div class="badge badge-app p-2"><?=$totalPositions?></div>
                            </div>
                            <h5 class="border-bottom pb-2 text-app2 mt-5">Available Posts</h5>
                            <?php
                                if(count($positionData) > 0){
                                    foreach($positionData as $x){
                                        if($x["type"] == "head")
                                            echo '<h6 class="border-bottom pb-2 mt-3">' . $x["title"] . '</h6>';
                                        if($x["type"] == "data"){
                                            echo '<div class="d-flex border-bottom pt-2 pb-2 mb-2">
                                                        <div class="mr-auto">' . $x["title"] . '</div>
                                                        <div class="badge badge-app p-2">' . $x["count"] . '</div>
                                                    </div>';
                                        }
                                    }
                                }
                            ?>
                        </div>
                        <div class="col-md-6">
                        <img src="" class="col-12" />
                            <AdSense></AdSense>
                        </div>
                    </div>
                    <div class='row'>
                        <div class="col-md-12">
                            <h5 class="border-bottom pb-2 text-app2 mt-5">Details</h5>
                            <div><?=$data->ad_detail?></div>
                        </div>
                        <div class="col-md-12">
                            <div><?=$data->keywords?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>