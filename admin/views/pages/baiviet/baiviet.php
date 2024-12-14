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
                <h4 class="card-title">baiviet</h4>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="description">title</th>
                        <th>pagraph</th>
                        <th>image</th>
                        <th>id_blog</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($baiviets as $baiviet): ?>
                            <tr>
                                <td class="description"><?php echo $baiviet['title']; ?></td>
                                <td><?php echo $baiviet['pagraph']; ?></td>
                                <td><img src="<?php echo APPURL . "asset/images/" . $baiviet['image']; ?>" alt="" width="100"></td>
                                <td><?php echo intval($baiviet['id_blog']) ?></td>
                                <td><?php echo $baiviet['status']; ?></td>
                                <td>
                                    <a href="edit-baiviet?id=<?php echo $baiviet['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete-baiviet?id=<?php echo $baiviet['id']; ?>" class="btn btn-danger">Delete</a>
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