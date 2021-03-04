<?php /** @var $model \app\models\User; */?>
<h1>Login Page</h1>
<?php
    echo $form->field($model,'username');
    echo $form->field($model,'password')->passwordField();
    echo '<button type="submit" class="btn btn-primary">Submit</button>';
    \app\core\Form\Form::end();
?>
