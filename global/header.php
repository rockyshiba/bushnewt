<?php 
$webroot = "http://www.ghosteacher.com/bushnewt";

$telephone_number = "905-836-4442"; 
$email = "info@treefrog.ca";

$menu_sub_items = "<ul class='menu-sub-items'>";
$menu_sub_items .= "<li>Tertiary Item A</li><li>Tertiary Item B</li><li>Tertiary Item C</li>";
$menu_sub_items .= "</ul>";

$menu_items = "";
$menu_items .= "<ul class='menu-items'>";
$menu_items .= "<li>Menu item A $menu_sub_items</li><li>Menu item B $menu_sub_items</li>";
$menu_items .= "</ul>";

$nav_menu;
$nav_menu .= "<ul class='nav-list'>";
$nav_items = array("Home" => "#", "About" => "#", "Products" => "#", "Services" => "#", "Contact" => "#");

//populate nav menu
foreach($nav_items as $nav => $item){
    $nav_menu .= "<li>" . "<a href='$item'>" . $nav . $menu_items . "</a>";
}

$nav_menu .= "</ul>";
?>
<header>
	<div id="header-banner">
		<a href="<?php echo $webroot; ?>" class="tf-logo"><img class="tf-logo-img" src="<?php echo $webroot . "/tfimages/treefrog_logo.png"; ?>" alt="tf-logo"></a>
		<div class="header-contact">
            Telephone: <?php echo $telephone_number; ?> <br>
            Email: <?php echo $email; s?>
		</div>
	</div>
	<nav id="header-nav">
        <?php echo $nav_menu; ?>
	</nav>
</header>