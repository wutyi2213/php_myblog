<?php
    include "layouts/nav_sidebar.php";
    include "../dbconnect.php";

    $sql ="SELECT posts.*, users.name as user_name, categories.name as category_name FROM posts INNER JOIN users ON posts.user_id=users.id INNER JOIN categories ON posts.category_id = categories.id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $posts = $stmt->fetchAll();
    //var_dump($posts);
?>
    <main>
        <div class="container-fluid px-4">

            <div class="mt-3">
                <h1 class="mt-4 d-inline">Posts</h1>
                <a href="create_post.php" class="btn btn-lg btn-primary float-end">Create Post</a>
            </div>

            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
            </ol>
            
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Posts
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                                foreach($posts as $post){                               
                            
                            ?>
                                <tr>
                                    <td><?= $post['title']?></td>
                                    <td><?= $post['user_name']?></td>
                                    <td><?= $post['category_name']?></td>
                                    <td>
                                        <a href="../detail.php" class="btn btn-sm btn-outline-primary">Detail</a>
                                        <a href="" class="btn btn-sm btn-outline-warning">Edit</a>
                                        <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </td>
                                </tr>

                            <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php
    include "layouts/footer.php";
?>               
