<?php include_once(ROOT. DS . "app" . DS . "views" . DS . "layouts" . DS . "header.php"); ?>
<br />
<form action="?url=index/login" method="post">
    <div>
        <input type="text" placeholder="username" />
    </div>
    <div>
        <input type="text" placeholder="password" />
    </div>
    <input type="submit" />
</form>
<?php include_once(ROOT. DS . "app" . DS . "views" . DS . "layouts" . DS . "footer.php"); ?>