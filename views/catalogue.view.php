<?php 
    $role = $_SESSION["role"] ?? "user"; 
?>

<section>
    <table>
        <tr>
            <th>Title</th>
            <th>Pages</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Author</th>
            <th>Lend</th>
        </tr>
    
        <?php
    
            if(isset($catalogue_data) && !empty($catalogue_data)) :
    
                foreach($catalogue_data as $catalogue) :
    
                    echo '<tr><td>' . htmlspecialchars($catalogue['book_title']) . '</td>';
                    echo '<td>' . htmlspecialchars($catalogue['book_pages']) . '</td>';
                    echo '<td>' . htmlspecialchars($catalogue['book_year']) . '</td>';
                    echo '<td>' . htmlspecialchars($catalogue['book_genre']) . '</td>';
                    echo '<td>' . htmlspecialchars($catalogue['book_author']) . '</td>';?>
                    <td>
                        <form id="user-delete" method="POST" action="/catalogue/save-lend">
                            <input type="hidden" name="book" value="<?= htmlspecialchars($catalogue['book_title'] ?? '')?>">
                            <button type="submit">Lend</button>
                        </form>
                    </td>
                    </tr>
                <?php endforeach;
            
            else :
    
                echo '<tr><td colspan="6">There are not any books registered in the catalogue</td></tr>';
    
            endif;
    
        ?>
    
    </table>
    <?php if($role == "admin") : ?>
    <div class="btn-insertb">
        <a href="/catalogue/insert">
            <button class="btn-signin">Insert books</button>
        </a>
    </div>
    </section>
    <?php endif; ?>