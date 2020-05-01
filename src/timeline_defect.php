<?php
    require_once("inc/db_query.php");
    require_once("inc/taskmaster.php");

    $db = new DBQuery;
    $taskmaster = new Taskmaster;

    $defects = $db->get_defect(10);

    while($defect = $defects->fetch_assoc()){
        $who_info = $db->get_who_info($defect["WHO"]);
        $files = $db->get_files($defect["UID"]);

        echo '<li class="registration" id="'.$defect["UID"].'">';
            echo '<div class="col-lg-8 col-md-10 col-sm-12 mx-auto p-1 post-container">';
                echo '<div class="post-header">';
                    echo '<div class="post-profile-pic"><img src="img/user/'.$who_info["E_ID"].'.jpg" class="post-img-profile-pic" height="40px" width="40px"/></div>';
                    echo '<div class="post-username-date-shift">';
                        echo '<div class="post-username">'.$who_info["NAME"].'</div>';
                        echo '<div class="post-date"><img src="img/pages/timeline/datetime.svg" class="post-icon"/>'.$defect["DATE"].'</div>';
                        echo '<div class="post-shift"><img src="img/pages/timeline/shift.svg" class="post-icon"/>'.$defect["SHIFT"].' Shift</div>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="post-section">';
                    echo '<div class="post-part-body">';
                        echo '<div class="post-part">'.$defect["PART_NAME"].'</div>';
                        echo '<div class="post-body">'.$defect["MODEL"].' '.$defect["BODY_NO"].'</div>';
                    echo '</div>';
                    echo '<div class="post-problem-des">'.$defect["PROBLEM_DES"].'</div>';
                        echo '<div class="post-problem-pic">';
                            while($file = $files->fetch_assoc()){
                                $dir = $taskmaster->img_path_parser($file["PHOTO_PATH"]);
                                echo '<img id="'.$defect["UID"].'"src="img/'.$dir.$file["PHOTO_PATH"].'" onClick="imgDetail(this.id)"/>';
                            }    
                    echo '</div>';
                echo '</div>';
                echo '<div class="post-footer">';
                    echo '<div class="post-occurrence-place"><img src="img/pages/timeline/pin.svg" class="post-icon"/>'.$defect["O_PLACE"].'</div>';
                    echo '<div class="post-uid"><img src="img/pages/timeline/uid.svg" class="post-icon"/>HMMA - '.$defect["UID"].'</div>';
                echo '</div>';
            echo '</div>';
        echo '</li>';
    }

?>
