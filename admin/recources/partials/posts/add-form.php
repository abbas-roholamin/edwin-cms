<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Dashboard / Add Post
        </h2>
    </div>
    <main>
        <div class="col-lg-12">
            <?php
                if (isset($_POST['save'])) {
                    $result = savePost($_POST);
                    if (!$result == 1) {
                        echo $result;
                    }
                }
            ?>
            <form action="#" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Post title" id="title">
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" class="form-control" placeholder="Post author" id="author">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="category">category</label>
                            <select class="form-control" id="category" name="category">
                                <?php
                                    // Get all categories form DB 
                                   $rows = getAllCategories();
                                    foreach ($rows as $row):
                                        $id = $row['id'];
                                        $title = $row['title'];
                                ?>
                                <option value="<?= $id?>"><?=$title ?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0">Pendding</option>
                                <option value="1">Published</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tag">Tags</label>
                            <input type="text" name="tags" class="form-control" placeholder="Post Tag" id="tag">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="custom-file form-group">
                            <label for="tag">Image</label>
                            <input type="file" class="custom-file-input form-control" name="image" id="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" rows="3" id="content"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </form>
        </div>
    </main>
</div>
<!-- /.row -->