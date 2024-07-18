<table>
<?php foreach ($articles as $article): ?>
    <tr>
        <td><?= $article->title ?></td>
        <td><?php debug($article->author) ?></td>
        <td><?php foreach ($article->tags as $tag) {debug($tag);} ?></td>
    </tr>
<?php endforeach; ?>
</table>

<?php
debug($articles);