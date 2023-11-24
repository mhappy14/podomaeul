<?php
    $title = 'array';
    include('inc/header.php');
?>
    <h2>for 반복문</h2>
    <?php
        $fruits = array('apple', 'banana', 'orange', '딸기', '오오', '로로', 'ㅁㅁ');
        echo $fruits [6].'<br/>';
        for($i = 0; $i < count($fruits); $i++){
            echo $fruits[$i].'<br/>';
        }
    ?>
</hr>
    <h2>foreach 반복문</h2>
    <?php
        foreach($fruits as $item){
            echo $item.'<br/>';
        }
    ?>
    </hr>
        <h2>연관배열 associate array</h2>
        <?php
            $prices = array();
            $prices['apple'] = 1000;
            $prices['banana'] = 2000;
            $prices['orange'] = 3000;
            foreach($prices as $key => $price){
                echo $key. " _ ".$price.'<br/>';
            }
        ?>
<?php
    include('inc/footer.php');
?>