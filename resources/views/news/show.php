<div>
    <h2><?=$news['title']?></h2>
    <p><?=$news['description']?></p>
    <div>
        <strong>
            <?=$news['author']?> (<?=$news['created_at']?>)
        </strong>
        <a href="<?=route('news')?>">Назад</a>
    </div>
</div>
