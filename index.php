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
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="post">
                <div id="quote-content">
                    <p>
                        <span style="opacity: 0.5;font-size: 10px">Quote Of The Day From Yoda</span>
                    </p>
                </div>
                <p class="author">
                    <span id="quote-title-dash">—</span> <span id="quote-title">
                        Master Yoda
                    </span>
                </p>
            </div>
        </div>
        <div class="col-md-6"
             style="margin: 100px auto;">
            <div class="col-md-12 event-list-block">
                <div class="cal-day">
                    <span>Today</span>
                  <?php echo date('l'); ?>
                </div>
                <ul class="event-list">
                  <?php loadnotes(); ?>
                </ul>
                <input type="text" class="form-control evnt-input"
                       placeholder="NOTES">
            </div>
        </div>
        <div class="col-md-3" style="margin: 100px auto;">
            <div id="gif-wrap">
            </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.slimscroll.js"></script>
        <script src="js/script.js"></script>
</body>
</html>