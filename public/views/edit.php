<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/description.css">
    <link rel="stylesheet" type="text/css" href="public/css/content.css">
    <script src="https://kit.fontawesome.com/cba7fd6ad8.js" crossorigin="anonymous"></script>
    <title>EDIT PROFILE</title>
</head>
<body>
<div class="base-container">
    <?php include('nav.php') ?>
    <main>
        <?php include('search-bar.php') ?>
        <section class="edit">
            <h2>EDIT PROFILE</h2>
            <form action="edit" method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="name" type="text" placeholder="Name">
                <input name="breed" type="text" placeholder="Breed">
                <input name="ownerName" type="text" placeholder="Owner name">
                <input name="ownerPhone" type="text" placeholder="Owner phone no.">

                <input type="file" name="file"/><br/>
                <button type="submit">send</button>
            </form>
        </section>
    </main>

</div>
</body>