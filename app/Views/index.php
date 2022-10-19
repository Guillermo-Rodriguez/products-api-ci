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
    <script type="text/javascript">
        const BASE_URL = '<?=base_url()?>';
    </script>
</head>
<body>
    <div class="container mt-5 p-5">
        <div class="p-5">
            <div class="row">
                <div class="col-12">
                    <label for="">Nombre del Cliente: </label>
                    <div class="input-group mb-3">
                        <input id="client-name" type="text" class="form-control" placeholder="Cliente">
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <div class="position-absolute end-0">
                    <button id="btn-cotizar" class="btn btn-success">Cotizar</button>
                </div>
            </div>
        </div>
        <div class="row mt-2 pl-2 pr-2" id="products">
 
        </div>   
    </div>
    <script type="text/javascript" src="<?=base_url()?>/js/products.js" ></script>
</body>
</html>