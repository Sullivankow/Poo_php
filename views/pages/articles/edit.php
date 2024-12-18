<form action="" method="post">
    <div>
        <label for="title">Titre</label>
        <input type="text" name="title" value="<?php echo $data['article']->title; ?>">
    </div>

    <div>
        <label for="content">Contenu</label>
        <textarea name="content" cols="30" rows="10"> <?php echo $data['article']->content; ?></textarea>
    </div>

    <div>
        <button type="submit">Ajouter</button>
    </div>
</form>