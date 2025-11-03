<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Shelf - Your open library</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header>
        
        <?php

            $logged = $_SESSION["logged"] ?? "false";
            $user = $_SESSION["username"] ?? null;
            $role = $_SESSION["role"] ?? "user";

            if($logged == "true") :
        
        ?>     
        <nav class="navbar">
            <div class="logo">Open Shelf</div>
            <ul>
                <li class="nav-links"><a href="/main-page">Home</a></li>
                <li class="nav-links"><a href="/catalogue">Catalogue</a></li>
                <li class="nav-links"><a href="/catalogue/search-to-lend">Lending book</a></li>
                <li class="nav-links"><a href="/author">For author</a></li>
                <?php if($role == "admin") : ?>
                <li class="nav-links"><a href="/admin">Admin</a></li>
                <?php endif; ?>    
            </ul>

            <a href="/my-profile">    
                <button class="btn-profile"><img class="img-profile" src="/assets/profile.webp" alt="My profile"></button>
            </a>
       </nav>

        <?php
            
            else :

        ?>
        
        <nav class="navbar">
            <div class="logo">Open Shelf</div>
            <ul>
                <li class="nav-links"><a href="/main-page">Home</a></li>
                <li class="nav-links"><a href="/catalogue">Catalogue</a></li>
                <li class="nav-links"><a href="/catalogue">Lending book</a></li>
                <li class="nav-links"><a href="/author">For author</a></li>
            </ul>        
            <div>
                <a href="/register">
                    <button class="btn-signin">Sign in</button>
                </a>
                <a href="/login">
                    <button class="btn-login">Login</button>
                </a>
                <a href="/my-profile">    
                     <button class="btn-profile"><img class="img-profile" src="/assets/profile.webp" alt="My profile"></button>
                </a>
            </div>        
        </nav>

        <?php endif; ?>

    </header>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-message" style="background-color: #f8d7da; color: #721c24; padding: 15px; margin: 20px; border: 1px solid #f5c6cb; border-radius: 5px; text-align: center; font-size: 1.1rem;">
            <?= htmlspecialchars($_SESSION['error']); ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-message" style="background-color: #d4edda; color: #155724; padding: 15px; margin: 20px; border: 1px solid #c3e6cb; border-radius: 5px; text-align: center; font-size: 1.1rem;">
            <?= htmlspecialchars($_SESSION['success']); ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>