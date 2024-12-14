<?php include_once 'views/partials/header.php'; ?>

<style>
    /* gioi han hien thi description */
    .description {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>




<div class="main-panel">
	<div class="content-wrapper">
    <div class="row">
        <div class="col grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">article</h4>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="description">title</th>
                        <th>paragraph</th>
                        <th>image</th>
                        <th>id_article</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article): ?>
                            <tr>
                                <td class="description"><?php echo $article['title']; ?></td>
                                <td><?php echo $article['paragraph']; ?></td>
                                <td><img src="<?php echo APPURL . "../img/blog/" . $article['image']; ?>" alt="" width="100"></td>
                                <td><?php echo intval($article['id_article']) ?></td>
                                <td><?php echo $article['status']; ?></td>
                                <td>
                                    <a href="edit-article?id=<?php echo $article['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete-article?id=<?php echo $article['id']; ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<script>



</script>



<?php include_once 'views/partials/_footer.php'; ?>