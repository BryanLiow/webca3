<?php

require('../model/database.php');
require('../model/category_db.php');
require('../model/tournament_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_tournament';
    }
} 

if ($action == 'list_tournament') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name = get_category_name($category_id);
    $tournaments = get_tournaments_by($category_id);

    include('tournament_list.php');
}

?>