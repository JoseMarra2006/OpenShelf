<div class="author-header">
    <h1>Author Portal</h1>
    <p>Welcome! This space is dedicated to independent authors who want to publish their books!</p>
    <div class="button_add_book">
        <a href="/catalogue/insert"> 
            <button>Register a New Book</button>
        </a>      
    </div>
</div>


<h2 class="title-authors">Your Registered Books</h2>
<table>
    <tr>
        <th>Title</th>
        <th>Pages</th>
        <th>Year</th>
        <th>Genre</th>
    </tr>

    <?php
    if(isset($author_books_data) && !empty($author_books_data)) :

        foreach ($author_books_data as $book) :
    ?>
            <tr>
                <td><?php echo htmlspecialchars($book['book_title']); ?></td>
                <td><?php echo htmlspecialchars($book['book_pages']); ?></td>
                <td><?php echo htmlspecialchars($book['book_year']); ?></td>
                <td><?php echo htmlspecialchars($book['book_genre']); ?></td>
            </tr>
    <?php
        endforeach;       
    else :
    ?>

        <tr>
            <td colspan="4">You have not registered any books yet.</td>
        </tr>
    <?php
    endif;
    ?>
    
</table>