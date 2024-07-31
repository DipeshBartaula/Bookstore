

<?php
$looking = isset($_Get['title']) || isset($_GET['author']);
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookStore</title>
</head>
<body>
    <p>
        <?php 
            echo loginMessage();
        ?>
    </p>
    <!-- Reading from books.json -->
    <?php
     $booksJson = file_get_contents(__DIR__.'/books.json');
     $books = json_decode($booksJson,true);
    //  var_dump($books);
     ?>
    <?php 
        if (isset($_GET['title'])) {
            echo '<p>Looking for <b>' . $_GET['title'] . '</b></p>';
            if (bookingBook($books, $_GET['title'])) {
                echo "Booked!";
                updateBooks($books);
            } else {
                echo 'The book is not available...';
            }
         } else {
            echo '<p>You are not looking for a book?</p>';
         }
    ?>
     <?php 
        // $books = [
        //     [
        //         'title' => 'To Kill A Mockingbird',
        //         'author' => 'Harper Lee',
        //         'available' => true,
        //         'pages' => 336,
        //         'isbn' => 9780061120084
        //     ],
        //     [
        //         'title' => '1984',
        //         'author' => 'George Orwell',
        //         'available' => true,
        //         'pages' => 267,
        //         'isbn' => 9780547249643
        //     ],
        //     [
        //         'title' => 'One Hundred Years Of Solitude',
        //         'author' => 'Gabriel Garcia Marquez',
        //         'available' => false,
        //         'pages' => 457,
        //         'isbn' => 9785267006323
        //     ],
        // ];
    ?>
    
    <ul>
    <?php foreach ($books as $book): ?>
        <li>
        <a href="?title=<?php echo $book['title']; ?>&author=<?php echo $book['author']?>">
            <?php echo printableTitle($book); ?>
        </a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
