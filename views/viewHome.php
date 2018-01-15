<?php
$this->_t = 'Mon blog';
?>
<div class="row">
 <?php       
foreach ($posts as $post): ?>

    <div class="col-md-6">
        <div class="card bg-primary text-white">
             <div class="card-body">
                 <h2><?= $post->title();?></h2>
                 <p><?= $content = substr($post->content(),0,100) ?>  ...  <a href="index.php?page=post&id=<?= $post->id();?>" class="text-dark card-link"> lire la suite</a></p>
                 
                <p><time>Le<?= date(" d/m/Y à H:i",strtotime($post->date()));?></time> par <?= $post->writer() ?></p>
        <div class="container">
               
            <img src="./img/posts/<?= $post->image();?>" class="img-thumbnail img-fluid" width="460" height="345" alt="<?= $post->title(); ?>" > 
            
        </div>

                 
             </div>
        </div>
        
    </div>

<?php endforeach; ?>
</div><!-- end class row -->
