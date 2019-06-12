<h1>Список статей</h1>
<?php foreach ($posts as $post):?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $post->title ?></h3>
        </div>
        <div class="panel-body">
            <?= $post->excerpt ?>
        </div>
    </div>
<?php endforeach;?>

