<?php
    $pageTitle = "Jobs Finders | Keywords";
    $relativePath = "../";

    require($relativePath . 'src/shared/admin-layout.php');

    include_once $relativePath . 'src/repositories/KeywordRepository.php';
    include_once $relativePath . 'src/models/KeywordModel.php';
    include_once $relativePath . 'src/services/pagination.php';
    include_once $relativePath . 'src/services/url-service.php';

    $currentPage = 0;
    if(isset($_GET["page"]) && is_numeric($_GET["page"]) && $_GET["page"] > 0)
        $currentPage = $_GET["page"];

    $keywordRepository = new KeywordRepository();
    $response = $keywordRepository->GetAll([ "page" => $currentPage, "pageSize" => $_ENV["PAGE_SIZE"] ]);
    $data = $response["result"];

    if(isset($_GET["delete"]) && is_numeric($_GET["delete"]) && $_GET["delete"] > 0){
        $deleteResult = $keywordRepository->delete($_GET["delete"]);
        if($deleteResult == 1){
            echo "<script>alert('Successfully deleted!')</script>";
            removeDeleteAndRefreshPage();
        }
    }
?>
<script>
    function confirmDelete(id){
        if(confirm("Are you sure you want to delete?")){
            if(window.location.href.indexOf('?') > -1){
                window.location.href = window.location.href + '&delete=' + id;
            }
            else{
                window.location.href = window.location.href + '?delete=' + id;
            }
        }
    }
</script>

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
                                                <a class='text-danger cursor-pointer' href='javascript:confirmDelete(".$item->id.");'>Delete</a>
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
    <div class='row'>
        <div class='col-md-12 d-flex justify-content-center'>
            <?=paginate($response, $currentPage)?>
        </div>
    </div>
</div>
<?php require($relativePath . 'src/shared/footer.php'); ?>