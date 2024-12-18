<h1>Liste des articles</h1>

<a href="/article/create">Ajouter un article</a>

<?php foreach ($data['articles'] ?? [] as $article): ?>
    <div>
        <a href="/article/show/<?php echo $article->id ?>"><?php echo $article->title ?></a>
    </div>
<?php endforeach; ?>
