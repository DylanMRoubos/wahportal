<?php

class Meeting extends DbTable  {


    function insert_meeting ($date_start, $date_end, $type, $title, $description, $extra){


        $query = "INSERT INTO meeting (meeting_date_start, meeting_date_end, meeting_type, meeting_title, meeting_description, meeting_extra) VALUES (?,?,?,?,?,?)";
        var_dump($$date_start, $date_end, $type, $title, $description, $extra);

        self::query('wah', $query, $result, 'ssssss',  [$date_start, $date_end, $type, $title, $description, $extra] );

    }

       /**
     * Get user data from database
     *
     * @param username          - the name of the user to get the data from
     *
     * @throws No_exceptions    - cause to lazy to program
     * @author Dylan Roubos
     * @return rows in an associative array
     */
    function get_user_data($mail) {
        $query = "SELECT mail, name, password, activated FROM user WHERE mail = ?";

        $result = NULL;

        self::query('wah', $query, $result, 's', [$mail] );


        return $result;

    }

    function get_meeting($season) {

        $query = "SELECT meeting_date_start, meeting_date_end, meeting_title, meeting_extra FROM meeting WHERE meeting_type = 0 AND meeting_season = ?";

        $result = NULL;

        self::query('wah', $query, $result, 's', [$season] );

        return $result;
    }
}