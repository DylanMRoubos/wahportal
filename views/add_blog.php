<main>
    <div class="container">
        <div class="row">
            <form action="add_blog.php" method="POST" enctype="multipart/form-data" style="width: 100%;">
                <div class="form-group">
                    <label for="title">Titel:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="description">Bericht</label>
                    <textarea type="text" rows="5" name="description" class="form-control" id="message"
                              placeholder=""></textarea>
                </div>
                <div class="custom-file col-md-3">
                    <input type="file" class="custom-file-input" id="add_fotos" name="U_FILES[]" multiple>
                    <label class="custom-file-label" for="add_fotos">Selecteer foto's</label>
                </div>
                <input type="submit" class="btn btn-primary" value="Blog maken" name="submit">

            </form>
        </div>
    </div>
</main>

