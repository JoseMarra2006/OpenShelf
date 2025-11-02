<section class="banner">
  <div class="banner-overlay"></div>
  <div class="banner-content">
    <h1>Welcome to Open Shelf</h1>
    <p>
      Open Shelf is your virtual library, designed to connect readers and authors worldwide. <br> 
      Discover thousands of books, borrow them online, and share knowledge with a global community. <br> 
      Your next great story is just one click away!
    </p>
    <button class="btn-signin"><a href="/catalogue">Start Exploring</a></button>
  </div>
</section>

<section class="catalog">
  <h2>New Arrivals</h2>
  <div class="book-grid">

    <?php
        if (isset($new_arrivals_data) && !empty($new_arrivals_data)) :
            foreach ($new_arrivals_data as $book) :
    ?>
                <div class="book-card">
                  <h3><?= htmlspecialchars($book['book_title']) ?></h3>
                  <p>Author: <?= htmlspecialchars($book['book_author']) ?></p>
                </div>
    <?php
            endforeach;
        else :
    ?>
        <p>No new books available at the moment.</p>
    <?php
        endif;
    ?>

  </div>
</section>