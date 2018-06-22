
<div class="footer">
    <h5 style="text-align:center; ">Sena project<a style="color:green; "> developed by Training Gym </a> </h5>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>js/application.js"></script>

    <script>
        <?php
        if(isset($_SESSION["mensaje"]) && $_SESSION["mensaje"] !=null ){
            echo $_SESSION["mensaje"];
            $_SESSION["mensaje"] = null;
        }
                    //se pone global para no ponerlo en varias vistas, se manda la condicion desde el controlador.
        ?>
    </script>
</body>
</html>
