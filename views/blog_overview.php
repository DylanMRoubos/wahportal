<main>
    <section>
        <div class="container">
            <div class="row">

                <?php foreach($blog_content as $single_blog) {
                    $blog_image = $blog->get_blog_images($single_blog["id"]); ?>
                <div class="col-sm-6">
                    <h2 class="center"><?= $single_blog["title"] ?></h2>
                    <h6 class="center"
                        style="font-style: italic"><?= substr($single_blog["created_at"], 0, 10) ?></h6>
                    <img class="futured-image" src="public/images/<?= $blog_image[0]["name"] ?>" alt="Main-image">
                    <br><br>
                    <p><?php if(strlen($single_blog["description"]) > 500) print(substr(Strip_tags($single_blog["description"], ""), 0, 500).'.........'); else { print(Strip_tags($single_blog["description"], "")); } ?></p>
                    <div class="center">
                        <a href="blog?p=<?= $single_blog["id"]?>" class="btn btn-lg btn-outline-secondary">Lees meer</a>
                    </div>
                    <hr>

                </div>
                <?php } ?>
            </div>
    </section>

</main>


