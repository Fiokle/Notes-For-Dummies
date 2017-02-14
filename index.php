<?php
include("worker.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
</head>
<body>
<div class="col-md-4"
     style="margin:0 auto;float:none !important; margin-top:50px;margin-bottom:60px">
    <div class="col-md-12 event-list-block">
        <div class="cal-day">
            <span>Today</span>
          <?php echo date('l'); ?>
        </div>
        <ul class="event-list">
          <?php loadnotes(); ?>
        </ul>
        <input type="text" class="form-control evnt-input" placeholder="NOTES">
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/script.js"></script>
</body>
</html>