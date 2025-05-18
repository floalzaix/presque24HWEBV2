<?php $this->layout('template', ['title' => 'La Guilde - Add Monster Bounty']) ?>
<?php $listTypes = ['babayaga', 'banshee', 'basilic', 'corbeau', 'demon', 'draugr', 'espritforet', 'goblin', 'gremlin', 'leshi', 'loup', 'loupgarou', 'vampire'] ?>

<h1 class="text-center my-4">Add Monster Bounty</h1>

<form action="" method="post" class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group mb-4">
                <label for="cost">Monster Bounty</label>
                <input type="number" class="form-control" id="cost" name="cost" required>
            </div>
            <div class="form-group mb-4">
                <label for="name">Monster Type</label>
                <select class="form-select" id="name" name="name">
                    <option value="">Select a type</option>
                    <?php foreach ($type as $listTypes): ?>
                        <option value="<?= $type ?>">
                            <?= ucfirst($type) ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add a Bounty</button>
        </div>
    </div>
</form>