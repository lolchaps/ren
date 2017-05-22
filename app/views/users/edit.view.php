<?php require __DIR__ .'/../partials/header.php'; ?>

<div class="container">
    <h1>Edit a user</h1>
   
    <form class="form-inline" method="post" action="/users/<?php echo $user->id; ?>">
        <div class="form-group">
            <input type="hidden" name="_method" value="PUT">
            <input class="form-control" type="text" name="user" value="<?php echo $user->name; ?>">
            <button type="submit" class="btn btn-info">Edit</button>
        </div>
    </form>
</div>
    
<?php require __DIR__ . '/../partials/footer.php'; ?>
