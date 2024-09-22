<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library ADMIN</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="../styles/admin.css">
    <!-- jquery local -->
    <!-- <script src="../js/jquery.js"></script> -->
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php
        require_once '../backend/config/db_connect.php';
        include_once '../backend/class/Book.php';
        include_once '../backend/class/User.php';
        include_once '../backend/class/LendBook.php';
    ?>
</head>
<body>
    <section class="container-fluid border d-flex ">
        <div class="side-bar bg-danger">
            <h1 class="fw-semibold p-5">Bookworld</h1>
            <ul class="options p-5">
                <li><a href="#reg_user">Registrar usuario</a></li>
                <li><a href="#reg_book">Registrar libro</a></li>
                <li><a href="#reg_lend">Reportar préstamo de libro</a></li>
                <li><a href="#list_lend">Libros prestados</a></li>
                <li><a href="#">Lista de libros (delete)</a></li>
                <li><a href="#">Lista de usuarios (update)</a></li>
                <li><img src="" alt=""></li>
                <li><button class="btn btn-primary" id="logout"><p>Cerrar sesión</p></button></li>
            </ul>
        </div>
        <main>
            <!-- register new user -->
            <div id="reg_user" class="cont_main p-5">
                <h3>Registrar usuario</h3>
                <form id="form_user">
                    <label for="id_user">ID: </label>
                        <input type="number" name="id_user" min="1">
                    <br>
                    <br>
                    <label for="name_user">Nombre: </label>
                        <input type="text" name="name">
                    <br>
                    <br>
                    <label for="email_user">Email: </label>
                        <input type="email" name="email">
                    <br>
                    <br>
                    <label for="password-user">Contraseña: </label>
                        <input type="password" name="password">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">
                        Enviar
                    </button>
                </form>
            </div>
            <!-- register new book -->
             <div id="reg_book" class="cont_main p-5">
             <h3>Registrar libro</h3>
                <form id="form_book">
                    <label for="book">Nombre del libro: </label>
                        <input type="text" name="name_book">
                    <br>
                    <br>
                    <label for="book">Autor: </label>
                        <input type="text" name="author_book">
                    <br>
                    <br>
                    <label for="book">ISBN: </label>
                        <input type="text" name="isbn_book">
                    <br>
                    <br>
                    <label for="book">Año: </label>
                        <input type="number" name="year" min="1">
                    <br>
                    <br>
                    <label for="book">Cantidad de libros: </label>
                        <input type="number" name="total_copies">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">
                        Enviar
                    </button>
                </form>
             </div>
             <!-- register lend of book -->
            <div id="reg_lend" class="cont_main p-5">
                <h3>Reportar préstamo de libro</h3>
                <form id="form_lend">
                    <label for="id_user">Usuario: </label>
                        <select name="id_user_lend">
                            <?php
                                $user = new User($conn);

                                $users = $user -> AllUsers();
                                foreach($users as $usuario){

                                    ?>
                            <option value="<?php echo $usuario['id'];?>"><?php echo $usuario['name'];?></option>

                            <?php
                                }
                            ?>

                        </select>
                    <br>
                    <br>
                    <label for="name_user">Libro: </label>
                    <select name="book_id_lend">
                        <?php
                                $book = new Book($conn);

                                $books = $book -> allBooks();
                                foreach($books as $libro){

                            ?>
                            <option value="<?php echo $libro['id'];?>"><?php echo $libro['title'];?></option>

                            <?php 
                                }
                            ?>
                        </select>
                    <br>
                    <br>
                    <label for="email_user">Fecha de entrega: </label>
                        <input type="date" name="return_date_lend">
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">
                        Enviar
                    </button>
                </form>
            </div>
             <!-- lent books -->
            <div id="list_lend" class="cont_main p-5">
                <h3>Libros prestados</h3>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre Libro</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Miembro</th>
                        <th scope="col">Fecha de préstamo</th>
                        <th scope="col">Fecha limite a entregar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $lent = new LendBook($conn);

                            $lentsqli = $lent -> allLentBooks();
                            foreach($lentsqli as $prestado){
                            
                        ?>
                            <tr>
                                <th scope="row"><?php echo $prestado['id'];?></th>
                                <td><?php echo $prestado['title'];?></td>
                                <td><?php echo $prestado['isbn'];?></td>
                                <td><?php echo $prestado['name'];?></td>
                                <td><?php echo $prestado['lend_date'];?></td>
                                <td><?php echo $prestado['due_date'];?></td>
                            </tr>

                        <?php 
                                }
                        ?>
                    </tbody>
                </table>
            </div>
         <!-- book list -->
         <div id="list_book" class="cont_main p-5">
                <h3>Lista de libros</h3>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre Libro</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Año</th>
                        <th scope="col">Total Copias</th>
                        <th scope="col">Copias Disponibles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            foreach($books as $libro){
                                $id = $libro['id'];
                        ?>

                        <tr>
                            <th scope="row"><?php echo $libro['id'];?></th>
                            <td><?php echo $libro['title'];?></td>
                            <td><?php echo $libro['isbn'];?></td>
                            <td><?php echo $libro['author'];?></td>
                            <td><?php echo $libro['published_year'];?></td>
                            <td><?php echo $libro['total_copies'];?></td>
                            <td><?php echo $libro['available_copies'];?></td>
                            <td><button class="btn btn-danger delete" data-id="<?php echo $id ?>">Eliminar</button></td>
                        </tr>

                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
        </main>
    </section>
</body>
<script src="../js/admin.js"></script>
</html>