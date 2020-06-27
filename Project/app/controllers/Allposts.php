<?php

class Allposts extends Controller
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
        #Pagination
        $number_of_results = $this ->postModel ->countPosts();
        $results_per_page = 6;
        $number_of_pages = ceil($number_of_results['0']/$results_per_page);
        if (!isset($_GET['index'])) {
            $page = 1;
        } else {
            $page = $_GET['index'];
        }
        $this_page_first_result = ($page-1)*$results_per_page;
        $allposts = $this -> postModel -> pagination('posts',$this_page_first_result, $results_per_page);

        $data = [
            'allposts' => $allposts,
            'page' => $page,
            'number_of_pages' => $number_of_pages
        ];

        $this -> view('allposts/index', $data);
    }

}
?>