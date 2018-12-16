<?php
$mvc=new controlador();
$mvc->cerrar_sesion();


 ?>
 <div class="modal" id="ModalEdit">
   <div class="modal">
     <div class="modal-content container">

       <!-- Modal Header -->
       <div class="modal-header">
         <h5>Editar</h5>

       </div>

       <!-- Modal body -->
       <div class="modal-body ">
           <form class="form-inline" role="form" id="nota">

                 <select class="form-control col-sm-2" name="alumno" id="alumnoEdit">

                 </select>



                 <select class="form-control col-sm-2" name="docente" id="docenteEdit" >

                 </select>

                 <select class="form-control col-sm-2" name="actividad"id="actividadEdit">

                 </select>
                 <input type="hidden" name="op" value="1">
                 <input type="hidden" name="sec" id="secEdit" value="">
                 <input type="hidden" name="gra"  id="graEdit" value="">

                 <input type="number" id="notaedit" class="form-control col-sm-2" min="0" max="10" name="notaEdit"size="2">

                 <button type="submit" class="btn btn-primary col-sm-1" >Agregar</button>
               </form>


       </div>

       <!-- Modal footer -->
       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>

     </div>
   </div>
 </div>
