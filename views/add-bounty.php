<?php $this->layout('templates', ['title' => 'La Guilde - Add Monster Bounty']) ?>

<link rel="stylesheet" href="public/css/add-bounty.css">

<h1 class="text-center my-4">Add Monster Bounty</h1>

<form action="" method="post" class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-group mb-4">
                <label for="cost">Monster Bounty</label>
                <input type="number" class="form-control" id="cost" name="cost" required>
            </div>
            <div class="form-group mb-4">
                <label for="monster">Monster</label>
                <select class="form-select" id="monster" name="monster">
                    <option value="">Select a monster</option>
                    <?php foreach ($listMonsters as $monster): ?>
                        <option value="<?= $monster ?>">
                            <?= ucfirst($monster) ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add a Bounty</button>
        </div>
    </div>
</form>