<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        function 함수이름(변수1, 변수2){
            할일
        }
        함수이름(); =>이러면 출력이 됨
    </pre>
    <h1>함수</h1>
    <?php
        function sum($x, $y){  
            return $x + $y;
        }
        echo sum(10,20);
        echo '<hr>';
        function sum1($x, $y){  
            $result1 = $x + $y;  //지역변수(local variable)
            return $result1;
        }
        $result1 = sum1(10,20);  //전역변수(global variable)
        echo $result1;
    ?>
    <hr>
    <hr>
    <h1>지역변수, 전역변수 비교</h1>
    <?php
        function myfunc(){
            $var = 10;
            echo"{$var}";
        }
        myfunc();
        echo"{$var}";  //지역변수로 지정된 것은 function밖에서 사용 불가
    ?>
    <hr>
    <?php
        $var2 = 20;
        function myfunc2(){
            echo"{$var2}";  //외부에서 지정된 변수는 사용 불가
            global $var2;   //global을 통해 외부에서 지정된 변수를 사용할 수 있음
            echo"{$var2}";
            echo "{$GLOBALS['var2']}"; //혹은 이렇게 사용할 수도 있음
        }
        myfunc2();
    ?>
    <hr>
    <h1>배열출력</h1>
    <?php
        $fruits = [
            'apple',
            'mango',
            'banana',
            'orange'
        ];
        // print($fruits);
        print_r($fruits);
        echo '<pre>';
        print_r($fruits);
        echo '</pre>';

        function output($value){
            echo '<pre>';
            print_r($value);
            echo '</pre>';
        }
        output($fruits);
    ?>
</body>
</html>