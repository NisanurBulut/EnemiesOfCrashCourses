<h1>Enemy List</h1>

<p>
    <a href="/enemy/create" type="button" class="btn btn-sm btn-success">Add Enemy</a>
</p>
<form action="" method="get">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $keyword ?>">
        <div class="input-group-append">
            <button class="btn btn-success" type="submit">Search</button>
        </div>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Movie</th>
        <th scope="col">Create Date</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($enemies as $i => $enemy) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <?php if ($enemy['image']): ?>
                    <img src="/<?php echo $enemy['image'] ?>" alt="<?php echo $enemy['title'] ?>" class="enemy-img">
                <?php endif; ?>
            </td>
            <td><?php echo $enemy['title'] ?></td>
            <td><?php echo $enemy['price'] ?></td>
            <td><?php echo $enemy['create_date'] ?></td>
            <td>
                <a href="/enemies/update?id=<?php echo $enemy['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="post" action="/enemies/delete" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $enemy['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>