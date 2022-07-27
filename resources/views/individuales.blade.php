<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Import Excel</title>
</head>
<body>

    <div class="container-fluid text-white text-center ">
        <div class="row mb-3 bg-primary">
            <div class="col-12 p-4">
                <h5>Registros de:</h5>
                <h3>
                    {{$registros[0]->nombre}}
                </h3>
            </div>
        </div>

    </div>

    <div class="container">
        
        <div class="row mt-4 justify-content-center">
            @forelse ($registros as $registro)
                <div class="col-4 m-2 mt-5">
                    <div class="card">
                        <div class="card-header text-white bg-secondary h4">{{$registro->nombre}}</div>
                        <div class="card-body text-center">
                            <h5> {{$registro->tiempo}} </h5>  
                           <small> <b> Checador: </b> {{$registro->dispositivos}} </small>
                        </div>
                        @if ($registro->estado == 'Entrada')
                            <div class="card-footer text-white bg-success">
                               <b> {{$registro->estado}} </b>
                            </div>
                        @else
                        <div class="card-footer text-white bg-danger">
                            <b> {{$registro->estado}} </b>
                         </div>
                        @endif

                    </div>
                </div>
            @empty
                <li>No hay registros</li>
            @endforelse


            
        </div>
    </div>

    



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>