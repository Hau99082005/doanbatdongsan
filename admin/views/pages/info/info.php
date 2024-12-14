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
                <h4 class="card-title">info</h4>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="description">name</th>
                        <th>image</th>
                        <th>pagraph</th>
                        <th>id_info</th>
                        <th>price</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($infos as $info): ?>
                            <tr>
                             <td class="description"><?php echo $info['name']; ?></td>
                             <td><img src="<?php echo APPURL . "assets/images/" . $info['image']; ?>" alt="" width="100"></td>
                                <td><?php echo $info['pagraph']; ?></td>
                                <td><?php echo intval($info['id_info']) ?></td>
                                <td><?php echo $info['price']; ?></td>
                                <td><?php echo $info['status']; ?></td>
                                <td>
                                    <a href="edit-info?id=<?php echo $info['id']; ?>" class="btn btn-primary">Edit</a>
                                    <a href="delete-info?id=<?php echo $info['id']; ?>" class="btn btn-danger">Delete</a>
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