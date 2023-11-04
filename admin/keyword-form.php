<?php
    $pageTitle = "Jobs Finders | Keyword Form";
    $relativePath = "../";
    require($relativePath . 'src/shared/admin-layout.php');

    include_once $relativePath . 'src/repositories/KeywordRepository.php';
    include_once $relativePath . 'src/models/KeywordModel.php';


    $keywordRepository = new KeywordRepository();
    $parentKeywords = $keywordRepository->GetParentKeywords();
    $mode = "add";
    $keywordData = new KeywordModel();

    if(isset($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"] > 0){
        $mode = "update";
        $keywordData = $keywordRepository->GetById($_GET["id"]);
    }

    if(isset($_POST["submit"])){
        $model = new KeywordModel();
        $model->keyword = $_POST["keyword"];
        $model->parent = $_POST["parent"] == "" ? 0 : $_POST["parent"];
        if($mode == "update"){
            $model->id = $_GET["id"];
            $result = $keywordRepository->Update($model);
        }
        else
            $result = $keywordRepository->Add($model);
        header("Location: ". $rootUrl . "admin/keywords.php");
        exit;
    }
?>
<div class="col-md-10 col-sm-12 col-xs-12 float-right main">
    <h4 class="ml-3 mr-3 border-bottom pb-2 mt-3">Keyword Form</h4>
    <div class="row m-0">
        <div class="col-md-8 mb-2">
            <form method="post">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="mr-2">Select Parent: </label>
                            <select class="form-control" name="parent">
                                <option value="0">Select parent</option>
                                <?php
                                    if(count($parentKeywords) > 0){
                                        foreach($parentKeywords as $item){
                                            $selected =  $keywordData->parent == $item->id ? "selected" : "";
                                            echo "<option value='".$item->id."' ".$selected.">".$item->keyword."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="mr-2">Keyword:</label>
                            <input type="text" class="form-control" value="<?=$keywordData->keyword?>" name="keyword" />
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" class="btn btn-primary float-right ml-3">Save Changes</button>
                        <a class="btn btn-secondary float-right" href="<?=$rootUrl . 'admin/keywords.php'?>">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require($relativePath . 'src/shared/footer.php'); ?>