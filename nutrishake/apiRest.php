
<?php include 'curl.php';
?>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content=""/>
        <meta name="author" content="" />
        <title>NutriShake</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
</head>
<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">NutriShake</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php#mainHead">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#about">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="service.php">Servizi</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#contact">Contatti</a></li>
                    </ul>
                </div>
            </div>
    </nav>
    <header class="masthead" id="mainHead">
    <div class="container px-4 px-lg-5 h-100">
    <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="card" style="width: 100rem;" >
            <img class="card-text" src="<?php echo htmlspecialchars(($json)["product"]["image_url"]); ?>" width="150px" height="150px" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Codice Prodotto : <?php echo htmlspecialchars(($json)["code"]); ?></h5>
                <p class="card-text">Categorie : <?php echo htmlspecialchars(($json)["product"]["categories"]); ?></p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Brands : <?php echo htmlspecialchars(($json)["product"]["brands"]); ?></li>
              <li class="list-group-item">Peso : <?php echo htmlspecialchars(($json)["product"]["quantity"]); ?></li>
              <li class="list-group-item">Nome Generico : <?php echo htmlspecialchars(($json)["product"]["generic_name_it"]); ?></li>
              <li class="list-group-item">Link : <?php echo htmlspecialchars(($json)["product"]["link"]); ?></li>
              <li class="list-group-item">Ingredienti : <?php echo htmlspecialchars(($json)["product"]["ingredients_text_it"]); ?></li>
              
            </ul>
            <div class="card-body">
            
            </div>
            </div>
        </div>
        </div>

        
    </header>          

<!-- Navigation-->





   





<?php include 'footer.php';
?>
</body>
</html>