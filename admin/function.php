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
    VALUES ('$title', '$author', $category, '$content','$tags' ,'$image_name', '$status',now())";
    $results = $connection->query($sql);
    if ($results) {
        move_uploaded_file($temp_location,'./public/image/'.$image_name);
        header('Location: posts.php');
    }else{
        return mysqli_error($connection);
    }
}


/**
 * editPost
 *
 * @param  mixed $id
 * @return void
 */
function getPostById($id)
{
    global $connection;
    $sql = "SELECT * FROM posts WHERE id = $id";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    $data['id'] = $rows[0]['id'];
    $data['title'] = $rows[0]['title'];
    $data['author'] = $rows[0]['author'];
    $data['category'] = $rows[0]['category_id'];
    $data['tags'] = $rows[0]['tag'];
    $data['status'] = $rows[0]['status'];
    $data['old_image'] = $rows[0]['image'];
    $data['content'] = $rows[0]['content'];  
    $data['date'] = $rows[0]['date'];  
    return $data;
}


/**
 * updatePost
 *
 * @param  mixed $post_id
 * @param  mixed $data
 * @return void
 */
function updatePost($post_id,$data)
{
    global $connection;
    if ($post_id != "") {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $status = $_POST['status'];
        $old_image = $_POST['old_image'];
        $image_name = $_FILES['image']['name'];
        $temp_location = $_FILES['image']['tmp_name'];
        $content = $_POST['content'];  
        $sql = "UPDATE posts SET title='{$title}', author='{$author}', category_id=$category, tag='{$tags}',";
        $sql .= "status='{$status}', image='{$image_name}', content='{$content}'  WHERE id = $post_id";
        $results = $connection->query($sql);
        if ($results) {
            move_uploaded_file($temp_location,'./public/image/'.$image_name);
            if($image_name){
                unlink($old_image,"./public/image/");
            }
            header('Location: posts.php');
        }else{
            echo mysqli_error($connection);
        }
    }else{
        echo "<div class='alert alert-danger'>Input feild is empty</div>";
    }

}


/**
 * deletePost
 *
 * @param  mixed $id
 * @return void
 */
function deletePost($id){
    global $connection;
    $sql = "DELETE FROM posts WHERE id = $id";
    $results = $connection->query($sql);
    if ($results) {
        header('Location: posts.php');
    }
}


/**
 * getAllComments
 *
 * @return void
 */
function getAllComments()
{
    global $connection;
    $sql = "SELECT c.*, p.title as post_name FROM comments as c INNER JOIN posts as p ON c.post_id=p.id";
    $results = $connection->query($sql);
    $rows = $results->fetch_all(1);
    return $rows;
}

/**
 * saveComment
 *
 * @param  mixed $data
 * @return void
 */
function saveComment()
{
    global $connection;
    $post_id = $_GET['post_id'];
    $author = $_POST['author'];
    $email = $_POST['email'];
    $content = $_POST['content'];    
    $sql = "INSERT INTO comments (post_id, author, email, content, date)
    VALUES ($post_id,'$author', '$email', '$content', now())";
    $results = $connection->query($sql);
    if ($results) {
       header('Location: post.php?post_id='.$post_id);
    }else{
        return mysqli_error($connection);
    }
}


?>