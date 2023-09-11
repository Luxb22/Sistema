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
             <a href="?c=Roles&a=registraRoles"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR USUARIO</a>
         </li>
         <li>
             <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE USUARIOS</a>
         </li>
         <li>
             <a href="#"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
         </li>
     </ul>
 </div>
 <!--CONTENT-->
 <div class="container-fluid">
     <div class="table-responsive">
         <table class="table table-dark table-sm">
             <thead>
                 <tr class="text-center roboto-medium">
                     <th>CÓDIGO ROL</th>
                     <th>CÓDIGO USUARIO</th>
                     <th>NOMBRE USUARIO</th>
                     <th>APELLIDO USUARIO</th>
                     <th>CEDULA USUARIO</th>
                     <th>EMAIL USUARIO</th>
                     <th>TELEFONO USUARIO</th>
                     <th>CONTRASEÑA USUARIO</th>
                     <th>STATUS USUARIO</th>
                     <th>ACTUALIZAR</th>
                     <th>ELIMINAR</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($users as $user) : ?>
                     <tr class="text-center">
                         <td><?php echo $user->getRolCode(); ?></td>
                         <td><?php echo $user->getUserCode(); ?></td>
                         <td><?php echo $user->getUserName(); ?></td>
                         <td><?php echo $user->getUserLastName(); ?></td>
                         <td><?php echo $user->getUserId(); ?></td>
                         <td><?php echo $user->getUserMail(); ?></td>
                         <td><?php echo $user->getUserPhone(); ?></td>
                         <td><?php echo $user->getUserPassword(); ?></td>
                         <td><?php echo $user->getUserStatus(); ?></td>
                         <td>
                             <a href="?c=Users&a=actualizarUsers&codigoUser=<?php echo $user->getUserCode() ?>" class="btn btn-success">
                                 <i class="fas fa-sync-alt">Actualizar</i>
                             </a>
                         </td>
                         <td>
                             <a href="?c=Roles&a=eliminarRoles&codigoRol=<?php echo $user->getUserCode() ?>" class="btn btn-warning">
                                 <i class="far fa-trash-alt">Eliminar</i>
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