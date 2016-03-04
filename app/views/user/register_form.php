    <form action="<?php echo getBaseUrl(); ?>?url=user_controller/do_register" id="register-form" method="post">
        <p>Register</p>
        <hr />
            <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong>
            </div>
            <div class="form-group">
                <label for="InputName">Enter Email : </label>

                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="regfister-form-email" placeholder="Enter Email"
                           required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="InputEmail">Enter Password : </label>

                <div class="input-group">
                    <input type="password" class="form-control" id="register-form-password" name="password1"
                           placeholder="Enter Password" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
            <div class="form-group">
                <label for="InputEmail">Confirm Password :</label>

                <div class="input-group">
                    <input type="password" class="form-control" id="register-form-password" name="password2"
                           placeholder="Confirm Password" required>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                </div>
            </div>
        <div class="form-group" style="text-align: center;">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
        </div>
        <p>OR <a href="<?php echo getBaseUrl(); ?>?url=user/login">Login</a></p>
    </form>
    <div class="errorHolder"></div>
