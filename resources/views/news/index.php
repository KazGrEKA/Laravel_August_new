<?php foreach($newsList as $news): ?>
<div>
    <h2><a href="/news/<?$news['id']?>"><?=$news['title']?></a></h2>
    <p><?=$news['description']?></p>
</div>
<?php endforeach; ?>
