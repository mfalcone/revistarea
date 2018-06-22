<footer class="main-footer">
	<div class="logo-pie">Revista Rea</div>
</footer>
<footer class="bottom-footer">
	<?php 
		setlocale(LC_ALL,"es_ES");
		$fecha = strftime("%A %d de %B del %Y");
	?>
	<?php echo $fecha; ?> ® Todos los derechos reservados. <strong>Revista Rea</strong>.
</footer>
</body>
</html>
<?php wp_footer(); 
?>
