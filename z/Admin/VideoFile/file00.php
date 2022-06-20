<?php

/*不更新任何文件*/
    $name = $_SESSION['name'];
    $time = date('Y-m-d H:i:s', time());
    $sql = "UPDATE videos SET
            videoname='$videoname',tid='$videotype',intro='$videointro',uploaddate='$time',uploadadmin='$name',hittimes=0,downtimes=0
            WHERE vid=$vid";