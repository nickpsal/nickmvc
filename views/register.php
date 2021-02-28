<h1>Register Page</h1>
<form action="" method="post">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name = "firstName" value = "<?php echo $model->firstName;?>" 
                class="form-control<?php echo $model->hasError('firstName') ? ' is-invalid' : '' ?>">
                <div class=" invalid-feedback"><?php echo $model->getFirstError('firstName') ?></div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name = "LastName" value = "<?php echo $model->LastName;?>" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name = "email" value = "<?php echo $model->email;?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name = "username" value = "<?php echo $model->username;?>" class="form-control">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name = "password" value = "<?php echo $model->password;?>"class="form-control">
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name = "confirm_password" value = "<?php echo $model->confirm_password;?>" class="form-control" >
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>