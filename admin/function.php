<?php


/**
 * getAllCategories
 *
 * @return Arrary
 */
function getAllCategories()
{
    global $connection;
    $sql = "SELECT * FROM categories";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    return $rows;
}

/**
 * saveCategory
 *
 * @param  mixed $category_name
 * @return void
 */
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

/**
 * deleteCategory
 *
 * @param  mixed $id
 * @return void
 */
function deleteCategory($id){
    global $connection;
    $sql = "DELETE FROM categories WHERE id = $id";
    $results = $connection->query($sql);
    if ($results) {
        header('Location: categories.php');
    }
}

/**
 * editCagtegory
 *
 * @param  mixed $id
 * @return Arrary
 */
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

/**
 * updateCategory
 *
 * @param  mixed $category_id
 * @param  mixed $category_name
 * @return void
 */
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

/**
 * getAllPosts
 *
 * @return Arrary
 */
function getAllPosts()
{
    global $connection;
    $sql = "SELECT p.*, c.title as category FROM posts as p INNER JOIN categories as c ON p.category_id=c.id";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    return $rows;
}


/**
 * savePost
 *
 * @param  mixed $data
 * @return void
 */
function savePost($data)
{
    global $connection;
    $title = $_POST['title'];
    $author = $_POST['author'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $status = $_POST['status'];
    $image_name = $_FILES['image']['name'];
    $temp_location = $_FILES['image']['tmp_name'];
    $content = $_POST['content'];    
    $sql = "INSERT INTO posts (title, author, category_id, content, tag, image, status, date)
    VALUES ('$title', '$author', '$category', '$content','$tags' ,'$image_name', '$status',now())";
    $results = $connection->query($sql);
    if ($results) {
        move_uploaded_file($temp_location,'./public/image/'.$image_name);
        return 1;
    }else{
        return mysqli_error($connection);
    }
}
?>