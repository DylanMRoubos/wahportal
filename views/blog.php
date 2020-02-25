<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">

                    <h2 class="center"><?= $blog_content[0]["title"] ?></h2>
                    <h6 class="center"
                        style="font-style: italic"><?= substr($blog_content[0]["created_at"], 0, 10) ?></h6>
                    <img class="futured-image" src="public/images/<?= $images[0]["name"] ?>" alt="Main-image">
                    <br><br>
                    <p><?= $blog_content[0]["description"] ?></p>
                    <hr>
                    <div class="row">
                        <?php foreach ($images as $image) { ?>
                            <div class="col-sm-4 no-padding">
                                <a data-fancybox="gallery" href="public/images/<?= $image["name"] ?>">
                                    <img class="lightbox-image" src="public/images/<?= $image["name"] ?>"></a>
                            </div>
                        <?php } ?>
                    </div>

                </div>

                <div class="col-sm-3">
                    <img class="avatar" src="public/images/ikki.png" alt="ikki">
                    <h2 class="center">Ikki</h2>
                </div>

            </div>
    </section>

</main>


