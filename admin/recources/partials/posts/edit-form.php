<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            Dashboard / Edit Post
        </h2>
    </div>
    <main>
        <div class="col-lg-12">
            <?php
                // Edit post func -->
                if (isset($_GET["id"])){
                    $data = getPostById($_GET["id"]);
                }

                if (isset($_POST['upadate'])) {
                    $id = $_POST['id'];
                    if($id){
                        $result = updatePost($id,$_POST);
                        if (!$result == 1) {
                            echo $result;
                        }
                    }
                }
            ?>
            <form action="#" enctype="multipart/form-data" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="hidden" name="id" value="<?=$data['id']?>">
                            <input type="text" name="title" value="<?=$data['title']?>" class="form-control"
                                placeholder="Post title" id="title">
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" name="author" value="<?=$data['author']?>" class="form-control"
                                placeholder="Post author" id="author">
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
                                <option value=" <?= $id?>" <?=($id == $data['category'] )? "selected" : "";?>>
                                    <?=$title ?>
                                </option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="0" <?=($data['status'] == 0)? "selected":""?>>Pendding</option>
                                <option value="1" <?=($data['status'] == 1)? "selected":""?>>Published</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="tag">Tags</label>
                            <input type="text" name="tags" value="<?=$data['tags']?>" class="form-control"
                                placeholder="Post Tag" id="tag">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- <?php if($data['old_image']):?>
                        <img src="./public/image/<?=$data['old_image']?>" alt="old_image"
                            style="max-width: 10rem; max-height: 10rem;">
                        <?php endif?> -->
                        <div class="custom-file form-group">
                            <label for="tag">Image</label>
                            <input type="hidden" value="<?=$data['old_image']?>" class="custom-file-input form-control"
                                name="old_image" id="image">
                            <input type="file" class="custom-file-input form-control" name="image" id="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" rows="3"
                                id="content"><?=$data['content']?></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="upadate" class="btn btn-primary">update</button>
            </form>
        </div>
    </main>
</div>
<!-- /.row -->