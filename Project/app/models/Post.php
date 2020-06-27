<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this -> db = new Database;
    }

    public function getPosts()
    {
        $this -> db -> query('SELECT *,
                        posts.id as postId,
                        users.id as userId,
                        posts.created_at as postCreated,
                        users.created_at as userCreated
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.created_at DESC
                        LIMIT 9
                        ');

        $results = $this -> db -> resultSet();

        return $results;
    }
    public function getCategories()
    {
        $this -> db -> query("SELECT DISTINCT categories FROM posts");

        $categories = $this -> db -> resultSet();

        return $categories;
    }
    public function getCategoryByName($name)
    {
        $this -> db -> query('SELECT * FROM posts WHERE categories= :categories');
        $this -> db -> bind(':categories', $name);

        $results = $this -> db -> resultSet();

        return $results;
    }
    public function getUserPostsById($id)
    {
        $this -> db -> query('SELECT * FROM posts WHERE user_id= :user_id');
        $this -> db -> bind(':user_id', $id);

        $results = $this -> db -> resultSet();

        return $results;
    }
    #CRUD
    public function addPost($data)
    {
        $this -> db -> query('INSERT INTO posts (title, user_id, categories, body) VALUES(:title, :user_id, :categories, :body)');
        // Bind values
        $this -> db -> bind(':title', $data['title']);
        $this -> db -> bind(':user_id', $data['user_id']);
        $this -> db -> bind(':categories', $data['categories']);
        $this -> db -> bind(':body', $data['body']);

        // Execute
        if ($this -> db -> execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePost($data)
    {
        $this -> db -> query('UPDATE posts SET title = :title, categories = :categories, body = :body WHERE id = :id');
        // Bind values
        $this -> db -> bind(':id', $data['id']);
        $this -> db -> bind(':title', $data['title']);
        $this -> db -> bind(':categories', $data['categories']);
        $this -> db -> bind(':body', $data['body']);

        // Execute
        if ($this -> db -> execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getPostById($id)
    {
        $this -> db -> query('SELECT * FROM posts WHERE id = :id');
        $this -> db -> bind(':id', $id);

        $row = $this -> db -> single();

        return $row;
    }
    public function deletePost($id)
    {
        $this -> db -> query('DELETE FROM posts WHERE id = :id');
        // Bind values
        $this -> db -> bind(':id', $id);

        // Execute
        if ($this -> db -> execute()) {
            return true;
        } else {
            return false;
        }
    }
    #Count
    public function countPosts()
    {
        $this -> db -> query("SELECT COUNT(*) FROM posts");
        $countPosts = $this -> db -> singleNum();
        return $countPosts;
    }
    public function countCategories()
    {
        $this -> db -> query("SELECT COUNT(DISTINCT categories) FROM posts");
        $countCtg = $this -> db -> singleNum();
        return $countCtg;
    }
    public function countUsers()
    {
        $this -> db -> query("SELECT COUNT(*) FROM users");
        $countUsers = $this -> db -> singleNum();
        return $countUsers;
    }
    public function pagination($table, $this_page_first_result, $results_per_page)
    {
        $this -> db -> query("SELECT * FROM $table LIMIT :result, :page");
        $this -> db -> bind(':result', $this_page_first_result);
        $this -> db -> bind(':page', $results_per_page);

        $results = $this -> db -> resultSet();
        return $results;
    }

}