<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a  style="font-size:14px;"href="#">
                Menu general
            </a>
        </li>
        <li >
            <a href="<?php echo controlador::$rutaAPP ?>index.php?action=index"> Inicio</a>
        </li>
        <li>
            <a id="matricula">Matricula</a>
            <ul id="abrirmatr" class="mirar">
              <li > <a href="<?php echo controlador::$rutaAPP ?>index.php?action=responsable">Nueva matricula</a></li>
              <li > <a href="<?php echo controlador::$rutaAPP ?>index.php?action=getmatricula">Reingreso</a></li>
              <li > <a href="<?php echo controlador::$rutaAPP ?>index.php?action=getalumo">Administar Alumnos</a></li>
              <li > <a href="<?php echo controlador::$rutaAPP ?>index.php?action=getrespon">Admon responsables</a></li>

            </ul>
        </li>
        <li>
            <a id="borra">Notas</a>
            <ul id="abrir" class="mirar">
              <li > <a href="<?php echo controlador::$rutaAPP ?>index.php?action=actividades">Administar Actividades</a></li>
              <li > <a href="<?php echo controlador::$rutaAPP ?>index.php?action=notas">Administar Notas</a></li>
            </ul>
        </li>

        <li>
            <a href="<?php echo controlador::$rutaAPP ?>index.php?action=grados">Grados</a>
        </li>

        <?php  if ($_SESSION["tipo"]==1) {

         ?>
         <li>
             <a href="<?php echo controlador::$rutaAPP ?>index.php?action=usuario">Usuarios</a>
         </li>
        <li>
            <a href="<?php echo controlador::$rutaAPP ?>index.php?action=admin">Administar año escolar</a>
        </li>
      <?php
    } ?>
    </ul>
</div>
