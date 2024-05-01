<?php
echo '<div class="py-1 mb-4 border-bottom"><ul class="nav">';
echo '<li><a class="nav-link fw-bold text-danger">기출</a></li>';
    foreach($boardArr AS $row) {
        if(isset($row['btype']) && $row['btype'] == 'question') {
            echo '<li class="d-flex flex-wrap nav-pills gap-3 justify-content-center"><a href="board.php?bcode='.$row['bcode'].'" class="nav-link';
            if(isset($_GET['bcode']) && $_GET['bcode'] == $row['bcode']) {
                echo ' fw-bold';
            }
            echo '">'.$row['name'].'</a></li>';
        }
    }
    $boardArr = $boardm->list();
    print_r($boardArr);
echo '<li><a class="nav-link fw-bold text-danger">과목</a></li>';
    foreach($boardArr AS $row) {
        if(isset($row['btype']) && $row['btype'] == 'theory') {
            echo '<li class="d-flex flex-wrap nav-pills gap-3 justify-content-center"><a href="board.php?bcode='.$row['bcode'].'" class="nav-link';
            if(isset($_GET['bcode']) && $_GET['bcode'] == $row['bcode']) {
                echo ' fw-bold';
            }
            echo '">'.$row['name'].'</a></li>';
        }
    }
echo '</ul></div>';
?>