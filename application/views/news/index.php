<a href="news/create">Add new article</a>
<hr />

<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title'] ?></h2>
    <div id="main">
        <?php echo $news_item['text'] ?>
    </div>
    <p><a href="news/view/<?php echo $news_item['slug'] ?>">View article</a></p>

<?php endforeach ?>