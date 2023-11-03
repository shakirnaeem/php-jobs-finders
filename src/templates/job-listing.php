<?php
    include $relativePath . 'src/factories/RepositoryFactory.php';
    
    $jobRepository = RepositoryFactory::CreateRepository('job');
    $data = $jobRepository->GetAll($searchText);

    function formatePositions($job){
        $positions = "";
        $positionsList = explode("\n", $job->positions);
        foreach($positionsList as $item){
            if (stripos($item, "===") === false) {
                $positionItems = explode(" ", $item);
                if (count($positionItems) > 1)
                    $positions .= trim($positionItems[1]) . " " . trim($positionItems[0]) . " | ";
            }
        }
        if ($positions != "") {
            $positions = substr($positions, 0, strlen($positions) - 3);
        }
        return $positions;
    }
?>
<div class="col-md-10 col-sm-12 col-xs-12 float-right main">
    <h4 class="ml-3 mr-3 border-bottom pb-2 mt-3"><?= $jobTitle ?></h4>
    <div class="row m-0">
        <?php
        foreach ($data as $job) { ?>
            <div class="col-md-12 mb-2">
                <div class="border rounded p-3">
                    <h5><?= $job->title ?></h5>
                    <div class="text-muted mb-4"><?= formatePositions($job) ?></div>
                    <div class="d-flex justify-content-between text-app"><div><?= $job->locations ?><br /><?= $job->ad_date ?></div>
                    <div><a class="btn btn-app" href="<?=$rootUrl . 'detail.php?id=' . $job->id?>">View Details</a></div></div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class='row'>
        <div class='col-md-12 d-flex justify-content-center'>
        </div>
    </div>
</div>