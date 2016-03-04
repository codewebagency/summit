    <br />

    <form action="?url=user/do_login" method="post" id="login-form">
        <p>Login</p>
        <hr />
        <div class="form-group">
            <label>Email : </label>
            <input type="email" placeholder="Email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Password : </label>
            <input type="password" placeholder="password" class="form-control" />
        </div>
        <div class="form-group text-center">
            <input type="submit"  class="btn btn-info" />
        </div>
        <hr />
        <p>OR <a href="<?php echo getBaseUrl(); ?>?url=user_controller/register">Signup</a></p>
    </form>

