<?php
	$title = "Saiyan's Coaching - Admin";
	$style = "stlStats.css";
	$navbar = "stlNavbar.css";
	include __DIR__ . '/../templates/header.php';
	include __DIR__ . '/../templates/navbarAdmin.php';
?>

<?php include __DIR__ . '/../admin/stats.php'; ?>

<?php include __DIR__ . '/../templates/footerAdmin.php'; ?>