<?php //if (!empty($errors)): ?>
<!--    <div class="alert alert-danger">-->
<!--        --><?php //foreach ($errors as $error): ?>
<!--            <div>--><?php //echo $error ?><!--</div>-->
<!--        --><?php //endforeach; ?>
<!--    </div>-->
<?php //endif; ?>

<form method="post" enctype="multipart/form-data">
    <?php if ($enemy['image']): ?>
        <img src="/<?php echo $enemy['image'] ?>" class="enemy-img-view">
    <?php endif; ?>
    <div class="form-group">
        <label>enemy Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>enemy name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $enemy['name'] ?>">
    </div>
    <div class="form-group">
        <label>enemy description</label>
        <textarea class="form-control" name="description"><?php echo $enemy['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label>enemy movie</label>
        <input name="movie" class="form-control" value="<?php echo $enemy['movie'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>