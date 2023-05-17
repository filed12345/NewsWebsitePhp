<!DOCTYPE html>
<html>
<head>
    <?php require '../app/views/header.php'; ?>
    <title>Admin - Edit News</title>
    <link rel="stylesheet" href="/NewsWebSitePhp/public/css/edit.css">
</head>
<body>
<div class="page-container">
    <div class="content-wrap">
        <div class="container">
            <h2 class="title">Edit News</h2>
            <form method="POST" action="/NewsWebSitePhp/public/update/<?= $news['id'] ?>" enctype="multipart/form-data">
                <label>Title:</label>
                <input type="text" name="title" value="<?= $news['title'] ?>">
                <?php if (isset($errors['title'])) echo "<p class='error-message'>{$errors['title']}</p>"; ?>

                <label>Author:</label>
                <input type="text" name="author" value="<?= $news['author'] ?>" disabled>

                <label>Body:</label>
                <textarea name="body"><?= $news['body'] ?></textarea>
                <?php if (isset($errors['body'])) echo "<p class='error-message'>{$errors['body']}</p>"; ?>

                <label>Current Image:</label>
                <img src="/NewsWebSitePhp/public/uploads/<?= $news['media'] ?>" alt="<?= $news['title'] ?>">

                <label>Upload New Image:</label>
                <input type="file" name="media">
                <?php if (isset($errors['media'])) echo "<p class='error-message'>{$errors['media']}</p>"; ?><br>

                <input type="submit" class="update-btn" value="Update News">
            </form>

            <!-- Comments Section -->
            <label>Comments:</label>
            <?php foreach ($news['comments'] as $comment): ?>
                <div class="comment">
                    <p><?= $comment['comment'] ?></p>
                    <form method="POST" action="/NewsWebSitePhp/public/deleteComment/<?= $news['id'] ?>/<?= $comment['id'] ?>">
                        <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                        <input type="submit" class="delete-comment-btn" value="Delete Comment">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php require '../app/views/footer.php'; ?>
</body>
</html>
