
<?php
foreach ($model->fetchFood() as $set) {
    foreach ($set as $type => $dish) {
        echo  "<h4>$type:$dish</h4><br>";
    }
    echo "<br>";
}
?>
