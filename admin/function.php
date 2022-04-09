<?php

// Category funtions
function getAllCategories()
{
    global $connection;
    $sql = "SELECT * FROM categories";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    return $rows;
}

function saveCategory($category_name)
{
    global $connection;
    if ($category_name != "") {
        $sql = "INSERT INTO categories (title) VALUES ('{$category_name}')";
        $results = $connection->query($sql);
        if ($results) {
            echo "<div class='alert alert-success'>Saved</div>";
            header('Location: categories.php');
        }else{
            echo "<div class='alert alert-warning'>Not saved</div>";
        }
    }else{
        echo "<div class='alert alert-danger'>Input feild is empty</div>";
    }

}

function deleteCategory($id){
    global $connection;
    $sql = "DELETE FROM categories WHERE id = $id";
    $results = $connection->query($sql);
    if ($results) {
        header('Location: categories.php');
    }
}

function editCagtegory($id)
{
    global $connection;
    $sql = "SELECT * FROM categories WHERE id = $id";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    $data['id'] = $rows[0]['id'];
    $data['title'] = $rows[0]['title'];
    return $data;
}

function updateCategory($category_id,$category_name)
{
    global $connection;
    if ($category_name != "") {
        $sql = "UPDATE categories SET title = '{$category_name}' WHERE id = $category_id";
        $results = $connection->query($sql);
        if ($results) {
            header('Location: categories.php');
        }else{
            echo "<div class='alert alert-warning'>Not saved</div>";
        }
    }else{
        echo "<div class='alert alert-danger'>Input feild is empty</div>";
    }

}

//posts function

function getAllPosts()
{
    global $connection;
    $sql = "SELECT p.*, c.title as category FROM posts as p INNER JOIN categories as c ON p.category_id=c.id";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    return $rows;
}
?>