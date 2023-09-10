<div class="full-box page-header">
     <h3 class="text-left">
         <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS
     </h3>
     <p class="text-justify">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum delectus eos enim numquam fugit optio accusantium, aperiam eius facere architecto facilis quibusdam asperiores veniam omnis saepe est et, quod obcaecati.
     </p>
 </div>
 <div class="container-fluid">
     <ul class="full-box list-unstyled page-nav-tabs">
         <li>
             <a href="?c=Roles&a=registraRoles"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR ROL</a>
         </li>
         <li>
             <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE ITEMS</a>
         </li>
         <li>
             <a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR ITEM</a>
         </li>
     </ul>
 </div>
 <!--CONTENT-->
 <div class="container-fluid">
     <div class="table-responsive">
         <table class="table table-dark table-sm">
             <thead>
                 <tr class="text-center roboto-medium">
                     <th>CÓDIGO USUARIO</th>
                     <th>NOMBRE USUARIO</th>
                     <th>ACTUALIZAR</th>
                     <th>ELIMINAR</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($roles as $rol) : ?>
                     <tr class="text-center">
                         <td><?php echo $rol->getRolCode(); ?></td>
                         <td><?php echo $rol->getRolName(); ?></td>
                         <td>
                             <a href="?c=Roles&a=actualizarRoles&codigoRol=<?php echo $rol->getRolCode() ?>" class="btn btn-success">
                                 <i class="fas fa-sync-alt"></i>
                             </a>
                         </td>
                         <td>
                             <a href="?c=Roles&a=eliminarRoles&codigoRol=<?php echo $rol->getRolCode() ?>" class="btn btn-warning">
                                 <i class="far fa-trash-alt"></i>
                             </a>                             
                         </td>
                     </tr>
                 <?php endforeach; ?>
             </tbody>
         </table>
     </div>
     <nav aria-label="Page navigation example">
         <ul class="pagination justify-content-center">
             <li class="page-item disabled">
                 <a class="page-link" href="#" tabindex="-1">Previous</a>
             </li>
             <li class="page-item"><a class="page-link" href="#">1</a></li>
             <li class="page-item"><a class="page-link" href="#">2</a></li>
             <li class="page-item"><a class="page-link" href="#">3</a></li>
             <li class="page-item">
                 <a class="page-link" href="#">Next</a>
             </li>
         </ul>
     </nav>
 </div>