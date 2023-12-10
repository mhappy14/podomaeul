<?php
    $_FILES['photo']['name'] = '2.jpg';

    $id = 'zzz';
    $arr = explode('.', $_FILES['photo']['name']);
    $ext = end($arr);
    $photo = $id.'.'.$ext;

    echo $photo;