<?php
$this->render('layouts/header');
?>
<div class="alert alert-danger url-not-found-alert"><span class="glyphicon glyphicon-remove"></span>The Requested Url "<?php echo getBaseUrl() . $items['controller'] . "/" .$items['action']; ?>" was not found on this server
    <button type='button' class='close' data-dismiss='alert'>×</button>
</div>
<?php
$this->render('layouts/footer');