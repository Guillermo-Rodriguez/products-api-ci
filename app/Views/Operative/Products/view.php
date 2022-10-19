<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>View</title>
</head>
<body>
    <div class="container mt-5 p-5">
        <div class="row mb-5">
            <div class="col">
                <a href="<?=base_url().'/operative/products/list'?>" class="btn btn-success">Productos</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <Strong><?=$product['nombre_producto']?></Strong>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <span class="badge text-bg-info"><?=$product['precio']?></span>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><?=$product['descripcion_producto']?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img class="img-thumbnail" src="<?=$product['imagen']?>" alt="<?=$product['nombre_producto']?>">
            </div>
        </div>
    </div>
</body>
</html>