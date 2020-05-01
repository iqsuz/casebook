<?php
    session_start();
    if(!isset($_SESSION["userAuth"])){
        http_response_code(404);
        header("Location: index.php");
        die();
    }

?>

<head>
    <title>Casebook Timeline</title>
</head>

<body>
    <div> 
        <form method="POST" action="create_case.php" enctype="multipart/form-data">
            <!--Created model radio buttons-->
            <?php
                require_once("./inc/db_query.php");
                $query_model = new DBQuery;
                $models = $query_model->model_list();

                while($model = $models->fetch_assoc()){
                    echo 
                    '<input type="radio" name="model" value="'.$model["BODY_3C"].'" required="required">
                    <label for="'.$model["BODY_3C"].'">'.$model["PROJECT_NAME"].'</label>';

                }
            ?>
            </br><input type="text" name="body_no" placeholder="Body #" maxlength="6" required></br>
            <input type="text" name="part_name" placeholder="P/Name" maxlength="20" required></br>
            <input type="text" name="o_place" placeholder="Occurrence Place" maxlength="20" required></br>
            <textarea name="problem_des" placeholder="Problem Description" required></textarea></br>
            <input type="file" name="files[]" accept="image/*, video/*" multiple required></br> 
            <input type="submit" name="create_case" value="Create Case">

        </form>
    </div>

</body>