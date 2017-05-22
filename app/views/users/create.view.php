<?php require __DIR__ . '/../partials/header.php'; ?>

    <div class="container">
    
        <h3>Submit Your Name</h3>

        <form  class="form-inline" method="POST" action="/users">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input class="form-control" id="inlineFormInput" name="name" required>   
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

<?php require __DIR__ . '/../partials/footer.php'; ?>
