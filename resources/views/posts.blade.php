<!DOCTYPE html>

<title>My Blog</title>
<link rel="stylesheet" href="./app.css">

<body>
    <?php foreach($posts as $post) : ?>
        <article>
            <h1>
                <a href="/posts/<?= $post->slug; ?>">
                    <?= $post->title; ?>
                </a>
            </h1>
            <div>
                <?= $post->excerpt; ?>
            </div>
        </article>
    <?php endforeach; ?>

    <!-- <article>
        <h1>
            <a href="/posts/my-first-post">My First Post</a>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui corporis odio tempore earum, enim quibusdam a quis rem ullam? Temporibus, sit aliquid iure rerum explicabo rem alias ut! Ad delectus id aut tempore blanditiis? Sunt, repudiandae impedit. Neque veritatis commodi eligendi fugiat ducimus odit ipsa necessitatibus? Sequi, repudiandae. Ipsam, aliquam.</p>
    </article>

    <article>
        <h1>
            <a href="/posts/my-second-post">My Second Post</a>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui corporis odio tempore earum, enim quibusdam a quis rem ullam? Temporibus, sit aliquid iure rerum explicabo rem alias ut! Ad delectus id aut tempore blanditiis? Sunt, repudiandae impedit. Neque veritatis commodi eligendi fugiat ducimus odit ipsa necessitatibus? Sequi, repudiandae. Ipsam, aliquam.</p>
    </article>

    <article>
        <h1>
            <a href="/posts/my-third-post">My Third Post</a>
        </h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui corporis odio tempore earum, enim quibusdam a quis rem ullam? Temporibus, sit aliquid iure rerum explicabo rem alias ut! Ad delectus id aut tempore blanditiis? Sunt, repudiandae impedit. Neque veritatis commodi eligendi fugiat ducimus odit ipsa necessitatibus? Sequi, repudiandae. Ipsam, aliquam.</p>
    </article> -->
</body>