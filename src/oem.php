<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style/oem.css">

    <title>Casebook - OEM Defect Register</title>
</head>

<body> 
    <nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="timeline.php"><img src="img/pages/index/icon.gif" height="25px" width="25px"/> casebook</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item nav-item-timeline">
            <a class="nav-link" href="timeline.php"><img src="img/pages/timeline/homepage.svg" height="20px" width="20px">Timeline</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="img/pages/timeline/create.svg" height="20px" width="20px">Create</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="post.php?house=inline"><img src="img/pages/timeline/inline.svg" height="20px" width="20px"> In-Line</a>
                <a class="dropdown-item" href="post.php?house=oem"><img src="img/pages/timeline/oem.svg" height="20px" width="20px"> OEM</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#"><img src="img/pages/timeline/reporting.svg" height="20px" width="20px">Reporting</a>
        </li>
    </ul>
    </div>
    </nav>
    <section>
        <div class="container-fluid">
            <div class="col-xl-8 col-md-10 col-sm-12 col-xs-12 mx-auto defect-registration">
                <form method="POST" action="create_case.php" enctype="multipart/form-data" autocomplete="off">
                    <!--Created model radio buttons-->
                    <div class="row align-self-center my-2">
                        <div class="col-1 label-text">Model <small class="text-muted">Required</small> </div>
                        <div class="col-11 radio-model">
                        <?php
                            require_once("./inc/db_query.php");
                            $query_model = new DBQuery;
                            $models = $query_model->model_list();

                            while($model = $models->fetch_assoc()){
                                echo 
                                '<div class="col-12">
                                <input type="radio" id="'.$model["BODY_3C"].'" class="model-radio" name="model" value="'.$model["BODY_3C"].'" required="required">
                                <label for="'.$model["BODY_3C"].'">'.$model["PROJECT_NAME"].'</label>
                                </div>';

                            }
                        ?>
                        
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12">
                            <label class="label-text" for="body_no">Body No</label>
                            <input type="text" class="form-control" id="body_no" name="body_no" placeholder="######" maxlength="6" required>
                            <small class="text-muted">Required</small>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col">
                            <label class="label-text" for="part_name">Part Name</label>
                            <input type="text" class="form-control" id="part_name" name="part_name" placeholder="e.g. Cluster" maxlength="20" required>
                            <small class="text-muted">Required</small>
                        </div>
                        <div class="col">
                            <label class="label-text" for="part_no">Part No</label>
                            <input type="text" class="form-control" id="part_no" name="part_no" placeholder="e.g. 81950-F2250TRY" maxlength="20">
                            <small class="text-muted">Optional</small>
                        </div>
                    </div>
                    
                    <div class="row my-3">
                        <div class="col-12">
                            <label class="label-text" for="o_place">Occurrence Place</label>
                            <input type="text" class="form-control" id="o_place" name="o_place" placeholder="e.g. Electrical Repair" maxlength="20" required>
                            <small class="text-muted">Required</small>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12">
                            <label class="label-text" for="problem_des">Problem Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="problem_des" rows="3" placeholder="Details here..." required></textarea>
                            <small class="text-muted">Required</small>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-12">
                            <label class="custom-file-label" for="customFile">Choose file/s</label>
                            <input type="file" class="custom-file-input" id="customFile" name="files[]" accept="image/*, video/*" multiple required>
                            <small class="text-muted">Required</small>
                        </div>
                    </div>
                    <input type="hidden" name="house" value="O" id="house">
                    <input type="hidden" name="seq" value="N/A" id="seq">
                    <input type="hidden" name="responsible" value="N/A" id="responsible">
                    <input type="submit" name="create_case" value="Create Case" class="btn btn-primary btn-lg btn-block mb-3">
                </form>
            </div>
        </div>
    </section>
    


    <script src="js/timeline.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>