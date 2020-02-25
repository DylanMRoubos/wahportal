<?php

require_once "vendor/autoload.php";

class User extends DbTable  {

    /**
     * Checks if username exists in database
     *
     * @param name - name to check in database
     *
     * @throws No_exceptions - cause to lazy to program
     * @author Dylan Roubos
     * @return Boolean
     */
    public function check_if_user_exists ($email){
        $query = "SELECT * FROM user WHERE mail = ?";

        $result = [];
        self::query('wah', $query, $result, 's',  [$email] );

        return $result ? true : false;

    }

    /**
     * Creates user in database
     *
     * @param name - uses the name to create the user
     * @param password - hashed password to add to the account
     *
     * @throws No_exceptions cause to lazy to program
     * @author Dylan Roubos
     * @return none
     */
    function create_user($name, $email, $password) {
        $query = "INSERT INTO user (mail, name, password) VALUES (?, ?, ?)";
        // var_dump($email, $name, $password);
        // die();
        self::query('wah', $query, $result , 'sss',  [$email, $name, $password]);

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


    /**
     * Logout the user
     *
     * @param none
     *
     * @throws No_exceptions cause to lazy to program
     * @author Dylan Roubos
     * @return none
     */
    public function logout() {
        $_SESSION["loggedin"] = NULL;
        $_SESSION["username"] = NULL;
        $_SESSION["user_id"] = NULL;

    }

}