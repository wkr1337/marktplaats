<?php
if (count(Controller::$errors) > 0) : ?>
    <div class="error">
        <?php foreach (Controller::$errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>