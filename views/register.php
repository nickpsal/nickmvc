<h1>Register Page</h1>
<?php
$form = \app\core\Form\Form::begin('', 'post');?>
<div class="row">
    <div class="col">
        <?php echo $form->field($model,'firstName'); ?>
    </div>
    <div class="col">
        <?php echo $form->field($model,'LastName'); ?>
    </div>
</div>
<?php
    echo $form->field($model,'email');
    echo $form->field($model,'username');
    echo $form->field($model,'password')->passwordField();
    echo $form->field($model,'confirm_password')->passwordField();
    echo '<button type="submit" class="btn btn-primary">Submit</button>';
    \app\core\Form\Form::end();
?>
