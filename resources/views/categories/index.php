<h1>Все категории</h1>
<br>
<?php foreach($categories as $category): ?>
    <div>
        <button><a href="<?=route('categories.show', ['id' => $category['id'], 'name' => $category['name']])?>"><?=$category['rus_name']?></a></button>
        <br><br>
    </div>
<?php endforeach; ?> 