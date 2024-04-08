<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ROOT?>public/styles.css">
    <title>Task Manager</title>
</head>
<body>
    <div id="container">
        <header>
            <nav id="header">
                <div id="title-div">
                    <h1>Gestion de Tareas<?= isset($_SESSION["user"]) ? " - " . $_SESSION["user"]->username : "" ?></h1>
                </div>
                <?php if(isset($_SESSION['user'])):?>
                    <div id="button-div">
                        <button type="button" id="exit-button"> Cerrar sesion </button>
                    </div>
                <?php endif;?>
            </nav>
        </header>
        <div id="app-content">