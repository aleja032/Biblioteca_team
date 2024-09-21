<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library ADMIN</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../styles/admin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid border d-flex">
        <div class="side-bar">
            <h1 class="fw-semibold p-5">Bookworld</h1>
            <ul class="options p-5">
                <li><a href="#">Registrar usuario</a></li>
                <li><a href="#">Registrar libro</a></li>
                <li><a href="#">Préstamo de libro</a></li>
                <li><a href="#">Reportar novedad de libro</a></li>
                <li><img src="" alt=""></li>
                <li><button class="btn btn-primary" id="logout"><p>Cerrar sesión</p></button></li>
            </ul>
        </div>
        <div class="main-cont p-5">
            Registrar usuario
            <form id="form_user">
                <label for="id_user">ID: </label>
                    <input type="number" name="id_user" min="1">
                <br>
                <label for="name_user">Nombre: </label>
                    <input type="text" name="name">
                <br>
                <label for="email_user">Email: </label>
                    <input type="email" name="email">
                <br>
                <label for="password-user">Contraseña: </label>
                    <input type="password" name="password">
                <br>
                <button type="submit">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</body>
<script src="../js/admin.js"></script>
</html>