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
</head>
<body>
    <section class="container-fluid border d-flex ">
        <div class="side-bar bg-danger">
            <h1 class="fw-semibold p-5">Bookworld</h1>
            <ul class="options p-5">
                <li><a href="#reg_user">Registrar usuario</a></li>
                <li><a href="#reg_book">Registrar libro</a></li>
                <li><a href="#">Reportar préstamo de libro</a></li>
                <li><a href="#">Libros prestados</a></li>
                <li><a href="#">Lista de usuarios</a></li>
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
                    <label for="book">ID Book: </label>
                        <input type="number" name="id_book" min="1">
                    <br>
                    <br>
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
                    <label for="id_user">ID Usuario: </label>
                        <input type="number" name="id_user_lend" min="1">
                    <br>
                    <br>
                    <label for="name_user">Libro: </label>
                        <select name="book_id_lend">
                        <option value="1">aaaa</option>
                        <?php
                                require_once '../backend/config/db_connect.php';
                                include_once '../backend/class/Book.php';

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
            
        </main>
    </section>
</body>
<script src="../js/admin.js"></script>
</html>