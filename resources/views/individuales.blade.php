<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="{{route('cargado')}}" class="text-white">Come Back</a>
            </div>
        </div>

    </div>

    <div class="container">
        
        <div class="row mt-4 justify-content-center">
            @forelse ($registros as $registro)
                <div class="col-4 m-2 mt-5">
                    <div class="card">
                        @if ($registro->anotaciones == 'Anotaciones')
                            <div class="card-header text-white bg-black h4">{{$registro->nombre}}</div>
                        @else
                        <div class="card-header text-white bg-success h4">{{$registro->nombre}}</div>                      
                        @endif

                        <div class="card-body text-center">

                            <h5> {{$registro->tiempo}} </h5>  
                           <small> <b> Checador: </b> {{$registro->dispositivos}} </small>
                           
                            @if ($registro->anotaciones == 'Anotaciones')
                            <form action="{{route('anotaciones', $registro->id)}}" method="POST" class="px-5 mt-3" >
                                @csrf @method('PATCH')
                                    <div class="form-group">
                                        <select class="custom-select form-control" name="anotaciones" id="inputGroupSelect01">
                                            <option value="Sin Anotaciones" class="text-secondary" selected>Sin anotaciones</option>
                                            <option value="OK" class="text-success" >OK</option>
                                            <option value="Retardo" class="text-danger">Llego tarde</option>
                                          </select>
                                    </div> 
                                
                                    <div class="form-group mt-2">
                                        <button class="btn btn-success btn-sm px-2">
                                            <i class="fa fa-floppy-disk"></i>
                                        </button> 
                                    </div>
                                </form> 

                                @else

                                    <div class="form-groud">
                                        <h4 class="text-center text-success  badge-success">{{$registro->anotaciones}}</h4>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ed{{$registro->id}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="ed{{$registro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editando anotaciones</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('anotaciones', $registro->id)}}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <div class="form-group">
                                                        <select class="custom-select form-control" name="anotaciones" id="inputGroupSelect01">
                                                            <option value="Sin Anotaciones" class="text-secondary" selected>Sin anotaciones</option>
                                                            <option value="OK" class="text-success" >OK</option>
                                                            <option value="Retardo" class="text-danger">Llego tarde</option>
                                                          </select>
                                                    </div> 
                                                    <div class="form-group mt-3">
                                                        <button class="btn btn-success btn-sm">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                        </div>
                            @if ($registro->estado == 'Entrada')
                                <div class="card-footer text-center bg-dark text-white">
                                <b> {{$registro->estado}} </b>
                                </div>
                            @else
                            <div class="card-footer text-center">
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