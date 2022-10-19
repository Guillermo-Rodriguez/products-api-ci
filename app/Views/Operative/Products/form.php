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
    <title>Products</title>
</head>
<body>
    <div class="container mt-5 p-5">
        <div class="row mb-5">
            <div class="col">
                <a href="<?=base_url().'/operative/products/list'?>" class="btn btn-success">Productos</a>
            </div>
        </div>
        <form 
            method="POST" 
            action="<?=base_url().( $acction == 'CREATE' ? '/operative/products/create' : '/operative/products/'.$product['id'].'/update')?>">
            <div class="row">
                <div class="col-4">
                    <label for="">Nombre</label>
                    <input class="form-control" type="text" name="nombre_producto" required value="<?=$product['nombre_producto'] ?? '' ?>">
                </div>
                <div class="col-4">
                    <label for="">Precio</label>
                    <input class="form-control" type="text" name="precio" pattern="^\d*(\.\d{0,2})?$" required value="<?=$product['precio'] ?? '' ?>">
                </div>
                <div class="col-4">
                    <label for="">Imagen</label>
                    <input class="form-control" type="text" name="imagen" placeholder="URL imagen" required value="<?=$product['imagen'] ?? '' ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="">Descripcion</label>
                    <textarea class="form-control" name="descripcion_producto" cols="30" rows="10" required><?=$product['descripcion_producto'] ?? '' ?></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
        </form>
    </div>
</body>
</html>