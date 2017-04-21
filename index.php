<?php $webroot = "http://www.ghosteacher.com/bushnewt";?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="<?php echo $webroot . "/global/css/global.css";?>">
        <link rel="stylesheet" type="text/css" href="<?php echo $webroot . "/global/css/index.css";?>">
    </head>
    <body>
        <?php include "global/header.php"; ?>
        <main>
        <div class="page-wrapper">
            <h1 class="heading-one">Heading One</h1>
            <section class="content" id="lorem">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                <a href="#"><button type="button" class="link-button">Link Button</button></a>
            </section>
        </div>
        </main>
        <?php include "global/footer.php"; ?>
    </body>
</html>