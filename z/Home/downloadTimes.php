<?php
    //此处为ajax执行页，计算下载量的
    $vid = $_GET['vid'];
    include '../Database/Connection.php';
    $result123 = mysqli_query($conn,"SELECT * FROM videos WHERE vid=$vid");
    $detail123 = mysqli_fetch_assoc($result123);
    $download = $detail123["downtimes"]+1;
    mysqli_query($conn,"UPDATE videos SET downtimes=$download WHERE vid=$vid");