<?php

    $logged = $_SESSION["logged"] ?? "false";
    $user = $_SESSION["username"] ?? null;
    $role = $_SESSION["role"] ?? "user";

    if($logged == "true") :
?>

    <h3>You are already logged.</h3>
    <p>Click <a href="/main-page">here</a> to get back to the home page</Strong></p>

<?php else : ?>

<section class="register-login-user">
    <h2 class="register-home">Register on OpenShelf</h2>

    <form id="register-login-form" method="POST" action="/register/save">
        <div class="username">
            <p class="question">Complete name</p>
            <input type="text" name="username" placeholder="Complete Name" required>
        </div>
        <div class="user-email">
            <p class="question">E-mail</p>
            <input type="email" name="user-email" placeholder="E-mail" required>
        </div>
        <div class="user-cpf">
            <p class="question">CPF</p>
            <input type="text" name="user-cpf" placeholder="123.456.789-12" required>
        </div>
        <div class="user-password">
            <p class="question">Password</p>
            <input type="password" name="user-password" placeholder="Password" required>
            </div>
        <div>
            <button class="btn-signin" type="submit">Sign in</button>
        </div>
    </form>
</section>
<?php endif; ?>