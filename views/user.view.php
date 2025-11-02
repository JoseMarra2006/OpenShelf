<div class="button_add_user">
    <a href="/user/register">
        <button>Register a New User</button>
    </a>
</div>

<h2 class="book-home">Users Registered</h2>

<ul class="user-list">

    <?php

    if (isset($all_users_data) && !empty($all_users_data)) :

        foreach ($all_users_data as $user) :
    ?>

            <li class="user-card">
                <div class="user-info">
                    <strong>Name:</strong> <?php echo htmlspecialchars($user['username']); ?>
                </div>
                <div class="user-info">
                    <strong>Email:</strong> <?php echo htmlspecialchars($user['user_email']);  ?>
                </div>
                <div class="user-info">
                    <strong>CPF:</strong> <?php echo htmlspecialchars($user['user_cpf']);  ?>
                </div>
            </li>
    
    <?php
        endforeach;

    else :
    ?>
        <li class="no-users">
            <p>There are no users registered in the system yet</p>
        </li>
    <?php
    endif;
    ?>
</ul>