<?php

/* @var $this yii\web\View */
/* @var $users app\models\Users[] */

$this->title = 'Becar Asset Management Group';
?>
<div class="site-index">
    <?php
        foreach ($users as $user) {
            echo $user->name." группа ".$user->group->name."<br />";
        }
    //echo "<pre>"; echo print_r($users, true); echo "<pre>";
    ?>
</div>
