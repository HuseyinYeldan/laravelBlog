<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
    <div class="container">
        <?php foreach($blogs as $blog):?>
        <article class="content">
            <h1 class="title"><?= $blog->title; ?></h1>
            <img src="<?=$blog->image?>" alt="">
            <p><?=$blog->excerpt?></p>
            <a href="/blog/<?=$blog->slug?>">Read More</a>
        </article>
        <?php endforeach;?>
    </div>

</body>
</html>