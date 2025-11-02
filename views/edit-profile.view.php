<section class="insert-book">
    <h2 class="book-home">Edit My Profile</h2>
<?php

    if (empty($current_user_data)) :
        echo '<p>Could not retrieve user data.</p>';
    else :
        
        $role = $_SESSION['role'] ?? 'user';
        $form_action = "/my-profile/update";
        if ($role == 'admin' && isset($_SESSION['admin_editing_user'])) {
            $form_action = "/admin/update";
        }
?>

<form id="edit-profile-form" method="POST" action="<?= $form_action ?>">
        <div class="user-email">
            <p class="question">Your new email</p>
            <input type="email" name="user-email" placeholder="E-mail" value="<?= htmlspecialchars($current_user_data['user_email']) ?>" required>
        </div>
        <div class="user-password">
            <p class="question">Your new password</p>
            <input type="text" name="user-password" placeholder="Password" value="<?= htmlspecialchars($current_user_data['user_password']) ?>" required>
        </div>
        <div>
            <button class="btn-signin" type="submit">Save Changes</button>
        </div>
    </form>
    <?php endif; ?>
</section>