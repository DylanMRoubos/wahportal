<main>
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Datum:</th>
                        <th scope="col">Tijden:</th>
                        <th scope="col">Activiteit:</th>
                        <th scope="col">Bijzonderheden:</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($meetings as $meeting) {

                        if ($meeting["meeting_title"] == "GEEN OPKOMST") {
                            print "<tr class='table-secondary font-weight-bold'>";
                            print("<td scope='row'>" . substr($meeting["meeting_date_start"], 5, 5) . (substr($meeting["meeting_date_start"], 5, 5) == substr($meeting["meeting_date_end"], 5, 5) ? "" : " - " . substr($meeting['meeting_date_end'], 5, 5) . "") . "</td>");
                            print("<td>" . $meeting["meeting_title"] . "</td>");
                            print("<td>" . $meeting["meeting_title"] . "</td>");
                            print("<td>" . $meeting["meeting_title"] . "</td>");
                            echo "</tr>";
                        } else {
                            print "<tr class=''>";
                            print("<td scope='row'>" . substr($meeting["meeting_date_start"], 5, 5) . (substr($meeting["meeting_date_start"], 5, 5) == substr($meeting["meeting_date_end"], 5, 5) ? "" : " - " . substr($meeting['meeting_date_end'], 5, 5) . "") . "</td>");
                            print("<td scope='row'>" . substr($meeting["meeting_date_start"], 11, 5) . " - " . substr($meeting["meeting_date_end"], 11, 5) . "</td>");
                            print("<td>" . $meeting["meeting_title"] . "</td>");
                            print("<td>" . $meeting["meeting_extra"] . "</td>");
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

