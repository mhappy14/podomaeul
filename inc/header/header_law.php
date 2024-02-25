<?php
echo '<div class="py-1 mb-4 border-bottom"><ul class="nav">';
    foreach($boardArr AS $row) {
        if(isset($row['btype']) && $row['btype'] == 'law_construction') {
            echo '<li class="d-flex flex-wrap nav-pills gap-3 justify-content-center"><a href="law.php?bcode='.$row['bcode'].'" class="nav-link';
            if(isset($_GET['bcode']) && $_GET['bcode'] == $row['bcode']) {
                echo ' fw-bold';
            }
            echo '">'.$row['name'].'</a></li>';
        }
    }
echo '</ul></div>';
?>