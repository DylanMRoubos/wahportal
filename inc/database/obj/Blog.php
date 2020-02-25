<?php

/**
 * Class used for anything related to the blog section of the portal including image handling
 *
 * @copyright  2020 Dylan Roubos
 * @since      Class available since Release 1.0.0
 */
class Blog extends DbTable {

    /**
     * Insert a blog post
     *
     * @param String - $title - the title for the blog
     * @param String - $description - the description for the blog
     *
     * @return none
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function insert_blog($title, $description) {

        $query = "INSERT INTO blog (title, description) VALUES (?,?)";

        self::query('wah', $query, $result, 'ss', [$title, $description]);

    }

    /**
     * Insert an image including the extension
     *
     * @param String - $image_name - name of the image including the extension
     *
     * @return none
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function insert_image($image_name) {

        $query = "INSERT INTO image (name) VALUES (?)";
        self::query('wah', $query, $result, 's', [$image_name]);

    }

    /**
     * Adds an image to a blog post
     *
     * @param intiger - $image_id - id of the image to add
     * @param integer - $blog_id - the id of the blog to use
     *
     * @return none
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function add_image_to_blog($image_id, $blog_id) {

        $query = "INSERT INTO blog_image (blog_id, image_id) VALUES (?, ?)";
        self::query('wah', $query, $result, 'ss', [$blog_id, $image_id]);

    }

    /**
     * Gets the latest added blog
     *
     *
     * @return rows in an associative array
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function get_latest_blog() {

        $query = "SELECT id FROM blog ORDER BY id DESC LIMIT 1;";

        $result = NULL;

        self::query('wah', $query, $result);


        return $result;

    }

    /**
     * Get the data from a single blog post (title, description) based on blog_id
     *
     * @param integer $blog_id - the blog_id
     *
     * @return rows in an associative array
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function get_blog($blog_id) {

        $query = "SELECT * FROM blog where id = ?";

        $result = null;
        self::query('wah', $query, $result, 'i', [$blog_id]);

        return $result;


    }

    /**
     * Get all the images from 1 blog post based on blog_id
     *
     * @param integer $blog_id - the blog_id
     *
     * @return rows in an associative array
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function get_blog_images($blog_id) {
        $query = "SELECT I.name FROM blog_image BI JOIN image I ON BI.image_id = I.id WHERE BI.blog_id = ?";

        $result = null;
        self::query('wah', $query, $result, 'i', [$blog_id]);

        return $result;
    }

    /**
     * Get image id based on the name
     *
     * @param String $username - the name of the image (including extension)
     *
     * @return rows in an associative array
     * @throws No_exceptions
     *
     * @author Dylan Roubos
     */
    function get_image_id_by_name($name) {

        $query = "SELECT id FROM image WHERE name = ?";

        $result = null;
        self::query('wah', $query, $result, 's', [$name]);

        return $result;
    }

    function get_all_blogs() {

        $query = "SELECT id, title, description, created_at FROM blog B ORDER BY created_at DESC";

        $result = null;
        self::query('wah', $query, $result);

        return $result;
    }
}