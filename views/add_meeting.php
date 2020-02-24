<main>
    <div class="container">
        <div class="row">
            <form action="add_meeting.php" method="POST" style="width: 100%;">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="begin_time">*Begin datum + tijd:</label>
                    <input type="text" class="form-control" name="begin_time" id="begin_time" placeholder="YYYY:MM:DD HH:MM:SS" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="end_time">*Eind datum + tijd:</label>
                    <input type="text" class="form-control" name="end_time" id="end_time" placeholder="YYYY:MM:DD HH:MM:SS" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Titel:</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="description">Beschrijving</label>
                    <textarea type="text" rows="5" name="description" class="form-control" id="description" placeholder=""></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="extra">Bijzonderheden:</label>
                        <input type="text" class="form-control" name="extra" id="extra" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="organisation">Organisatie</label>
                    <select id="organisation" class="form-control">
                        <option selected disabled="disabled">Kies een leiding</option>
                        <option >Lars</option>
                        <option>Hedwig</option>
                        <option>Ilse</option>
                        <option>Dylan</option>
                    </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Opkomst aanmaken</button>
            </form>
        </div>
    </div>
</main>

