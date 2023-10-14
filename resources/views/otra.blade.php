<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTRA</title>
    <link rel="shortcut icon" href="{{ asset('image/icono.png') }}" />

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- JAVASCRIPT --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>

<body>
    <h1 class="text-success">Titulo 1</h1>
    <h2 class="text-danger">Titulo 2</h2>
    <h3 class="text-primary">Titulo 3</h3>

    <div class="row">
        <div class="col-2">
            <input class="form-control" type="text">
        </div>
        <div class="col-1">
            <input class="form-control" type="password">
        </div>
        <div class="col-4">
            <input class="form-control" type="email">
        </div>
        <div class="col-3">
            <select class="form-control" name="name" id="name">
                <option value="1">opcion 1</option>
                <option value="2">opcion 2</option>
                <option value="3">opcion 3</option>
                <option value="4">opcion 4</option>
                <option value="5">opcion 5</option>
            </select>
        </div>
        <div class="col-2">
            <input class="form-control" type="text" readonly>
        </div>
    </div>

    <br>

    <input type="radio">
    <br>
    <input type="radio">
    <br>
    <input type="radio">

    <br>

    <input type="checkbox">
    <br>
    <input type="checkbox">
    <br>
    <input type="checkbox">
    <br>



    <br>
    <button class="btn btn-primary">Boton 1</button>
    <button class="btn btn-success">Boton 1</button>
    <button class="btn btn-secondary">Boton 1</button>
    <button class="btn btn-warning">Boton 1</button>
    <button class="btn btn-danger">Boton 1</button>

    <br>
    <a href="#" type="button">Redireccionar a:</a>
    <br>

    <table class="table table-bordered">
        <thead class="bg-primary">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody class="bg-secondary">
            <tr>
                <td>1</td>
                <td>Teo</td>
                <td>Montalvo</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Teo</td>
                <td>Montalvo</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Teo</td>
                <td>Montalvo</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Teo</td>
                <td>Montalvo</td>
                <td>
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
