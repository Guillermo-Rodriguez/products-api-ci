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
    <div class="container p-5">
        <div class="row">
            <div class="position-relative">
                <div class="position-absolute end-0">
                    <a href="<?=base_url().'/operative/products/new'?>" class="btn btn-success">Nuevo Producto</a>
                </div>
            </div>
        </div>
        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product) : ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['nombre_producto'] ?></td>
                        <td><?= $product['descripcion_producto'] ?></td>
                        <td>$<?= $product['precio'] ?></td>
                        <td>
                            <a class="btn btn-info" href="<?=base_url().'/operative/products/'.$product['id'].'/show'?>">Ver</a>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="<?=base_url().'/operative/products/'.$product['id'].'/edit'?>">Editar</a>
                        </td>
                        <td>
                            <form method="POST" action="<?=base_url().'/operative/products/'.$product['id'].'/delete'?>" >
                                <button class="btn btn-danger">Eliminar</button>    
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>