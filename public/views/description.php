<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/description.css">
    <script src="https://kit.fontawesome.com/cba7fd6ad8.js" crossorigin="anonymous"></script>
    <title>PET DESCRIPTION</title>
</head>
<body>
    <div class="base-container">
        <?php include('nav.php') ?>
        <main>
            <?php include('search-bar.php') ?>
            <section class="description">
                    <div id="info">
                        <img src="public/uploads/<?= $pet->getImage(); ?>">
                        <div>
                            <h2>Name: <?= $pet->getName(); ?></h2>
                            <p>Breed: <?= $pet->getBreed(); ?></p>
                            <p>Owner name: <?= $pet->getOwnerName(); ?></p>
                            <p>Owner phone no.: <?= $pet->getOwnerPhone(); ?></p>
                        </div>
                    </div>
            </section>
        </main>
        
    </div>
</body>