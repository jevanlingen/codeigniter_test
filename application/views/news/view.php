<?php
echo '<h2>'.$news_item['title'].'</h2>';
echo $news_item['text'];
?>
<p>Go back to <?=anchor("news","all news")?></p>