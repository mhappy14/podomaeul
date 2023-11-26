<?php
    if(!isset($title)){
        $title='';
    }
?>
<!-- 함수도 이와같이 따로 파일을 작성하여 불러오는 방식으로 사용가능 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title; ?></title>
</head>
<body>
    <h1><?=$title; ?></h1>