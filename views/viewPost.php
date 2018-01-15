<?php $title = 'Mon blog -'.$post['title'];?>


$this->_t = 'Mon blog';
<?php ob_start(); ?>
<article>
    <header>
        <h1 class="title_post"><?= $post['title']?></h1>
        <time><?= $post['date']?></time>
    </header>
    <p><?= $post['content'];?></p>
    <header>
        <h1 id="title_response">Commentaire sur <?= $post['title']?></h1>
    </header>
</article>


<?php foreach ($comments as $comment): ?>
<?php $content = $post->content()?>
<p><?= $comment['author']?> dit</p><br>
<p><?= $comment['content']?></p><br>
<hr>

<?php endforeach; ?>
<?php $content = ob_get_clean();?>
<?php require 'template.php';?>

