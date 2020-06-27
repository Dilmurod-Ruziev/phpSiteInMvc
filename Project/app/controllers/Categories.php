<?php

class Categories extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this -> postModel = $this -> model('Post');
        $this -> userModel = $this -> model('User');
    }

    public function index()
    {
        // Get posts
        $categories = $this -> postModel -> getCategories();

        $data = [
            'categories' => $categories
        ];

        $this -> view('categories/index', $data);
    }

    public function show($name)
    {
        $category = $this -> postModel -> getCategoryByName($name);

        $data = [
            'category' => $category
        ];

        $this -> view('categories/show', $data);
    }
}

?>