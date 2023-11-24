<?php
    $title = 'request';
    include('inc/header.php');
?>

<!-- get 방식(웹주소창에 입력한 값이 보임) -->
<!-- <?php
    $name = $_GET["userName1"];  //name값을 가져와야함
    $email = $_GET["userEmail"];
        echo $name."_".$email;
?> -->

<!-- post 방식(웹주소창에 입력한 값이 안보임) -->
<?php
    $name = $_POST["userName"];  //name값을 가져와야함
    $email = $_POST["userEmail"];
        echo $name."_333".$email;
?>

<?php
    include('inc/footer.php');
?>