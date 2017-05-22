<?php require __DIR__ .    '/../partials/header.php'; ?>
<div class="container">
    
    <?php require __DIR__ . '/../partials/message.php'; ?>
    
    <a href="users/create" class="btn btn-outline-primary">Add a new user</a>
    <h1>Users</h1>
    
    <?php if ($users->count() > 0) : ?>
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Username</th>
                <th>Options</th>
            </tr>
        </thead>
        <?php foreach ($users as $user) : ?>
        <tbody>
            <tr>
                <td><?= $user->name; ?></td>
                <td>
                    <form class="form-group" method="post" action="users/<?= $user->id ?>">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-secondary btn-sm" type="submit">Delete</button>
                        <a class="btn btn-secondary btn-sm" href="users/<?= $user->id ?>/edit">Edit</a>
                        <a class="btn btn-secondary btn-sm" href="users/<?= $user->id ?>">Show</a>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    <?php else : ?>
        <p>There are no users to display.</p>
    <?php endif; ?>
</div>
<?php require __DIR__ . '/../partials/footer.php'; ?>