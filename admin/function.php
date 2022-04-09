<?php


function getAllCategories()
{
    global $connection;
    $sql = "SELECT * FROM categories";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    return $rows;
}

function saveCategory()
{
    global $connection;
    if (isset($_POST['save'])) {
        $category_name = $_POST['category_name'];
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
}

function deleteCategory(){
    global $connection;
    if (isset($_GET['category_id'])) {
        $id = $_GET['category_id'];
        $sql = "DELETE FROM categories WHERE id = $id";
        $results = $connection->query($sql);
        if ($results) {
            header('Location: categories.php');
        }
    }
}

function editCagtegory()
{
    global $connection;
    $id = $_GET['id'];
    $sql = "SELECT * FROM categories WHERE id = $id";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    $data['id'] = $rows[0]['id'];
    $data['title'] = $rows[0]['title'];
    return $data;
}

function updateCategory()
{
    global $connection;
    if (isset($_POST['update'])) {
        $category_id = $_POST['category_id'];
        $category_name = $_POST['category_name'];
        if ($category_name != "") {
            $sql = "UPDATE categories SET title = '{$category_name}' WHERE id = $category_id";
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
}
?>