<form method="post" enctype="multipart/form-data">
    <?php if ($enemy['image']): ?>
        <img src="/<?php echo $enemy['image'] ?>" class="enemy-img-view">
    <?php endif; ?>
    <div class="form-group">
        <label>Image</label><br>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $enemy['name'] ?>">
    </div>
    <div class="form-group">
        <label>enemy description</label>
        <textarea class="form-control" name="description"><?php echo $enemy['description'] ?></textarea>
    </div>
    <div class="form-group">
        <label>Movie</label>
        <input name="movie" class="form-control" value="<?php echo $enemy['movie'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>