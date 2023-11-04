<?php
    $pageTitle = "Jobs Finders | Keywords";
    $relativePath = "../";

    require($relativePath . 'src/shared/admin-layout.php');

    include_once $relativePath . 'src/repositories/KeywordRepository.php';
    include_once $relativePath . 'src/models/KeywordModel.php';


    $keywordRepository = new KeywordRepository();
    $data = $keywordRepository->GetAll();
?>

<div class="col-md-10 col-sm-12 col-xs-12 float-right main">
    <div class="d-flex justify-content-between m-2"><h4 class="ml-3 mr-3 pb-2 mt-3">Keyword List</h4>
        <button class="btn btn-primary btn-sm m-3">Add New</button></div>
    <div class="row m-0">
        <div class="col-md-12 mb-2">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Keyword</th>
                                <th>Parent</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(count($data)){
                                    foreach($data as $item){
                                        echo "<tr>
                                            <td>".$item->keyword."</td>
                                            <td>".$item->parent."</td>
                                            <td><a class='text-warning' href='".$rootUrl."admin/keyword-form.php?id=".$item->id."'>Edit</a> &nbsp;|&nbsp;
                                                <a class='text-danger cursor-pointer'>Delete</a>
                                            </td>
                                        </tr>";
                                    }
                                }
                                else{
                                    echo "<tr><td colspan=3>No data found.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php require($relativePath . 'src/shared/footer.php'); ?>