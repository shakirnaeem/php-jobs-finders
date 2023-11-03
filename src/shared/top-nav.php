<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <a class="navbar-brand" href="/"><img src="<?= $relativePath . 'assets/logo.png' ?>" style="width:120px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
        <ul class="navbar-nav d-xs-none d-sm-none d-lg-flex">
            <li class="nav-item active"><a class="nav-link" href="<?=$rootUrl?>">All Jobs</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=$rootUrl . 'industry/government.php'?>">Government Jobs</a></li>
            <li class="nav-item"><a class="nav-link" href="<?=$rootUrl . 'location/pakistan.php'?>">Jobs in Pakistan</a></li>
        </ul>
    </div>
</nav>