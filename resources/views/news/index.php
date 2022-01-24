<h1>Все новости</h1>
<br>
<?php foreach($news as $newsItem): ?>
    <div>
        <strong><a href="<?=route('news.show', ['id' => $newsItem['id']])?>"><?=$newsItem['title']?></a></strong>
        <br><br>
        <em><?=$newsItem['description']?></em>
        <hr>
    </div>
<?php endforeach; ?>