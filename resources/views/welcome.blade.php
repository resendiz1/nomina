<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Import Excel</title>
</head>
<body>

    <div class="container-fluid bg-primary">
        <div class="row justify-content-center">
            <div class="col-3 text-center ">
                <form action="{{route('excel')}}" enctype="multipart/form-data" method="POST">
                    @csrf @method('post')
                    <div class="form-group p-2">
                        <input type="file" class="form-control " name="excel" required>
                    </div>
                    <div class="form-group p-2">
                        <button class="btn btn-info">
                            <i class="fa fa-upload"></i>
                            Cargar Archivo
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-12">
                @if (session('cargado'))
                    <div class="alert alert-success text-center">
                        {{session('cargado')}}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container">

        <div class="row mt-5">
            
            @forelse ($datos as $dato)
            @if ($dato->nombre != 'Nombre')
            <div class="col-4 mt-2">
                <div class="card">
                    <div class="card body p-5">
                        <h4>{{$dato->nombre}}</h4>
                        <a href="{{route('ver', $dato->numero)}}">Ver Registros</a>
                    </div>
                </div>
            </div>
            @endif

            @empty
                <li>No se a cargado ningun archivo</li>
            @endforelse           
          
        </div>


        <div class="row justify-content-center mt-4 mb-5">
            <div class="col-4 text-center">
                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-eraser"></i>
                    Borrar Actual Base de Datos
                </a>
            </div>
        </div>
    </div>
    




  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Do you want delete the database?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
          <a href="{{route('delete')}}" class="btn btn-danger">Borrar Base de Datos</a>
        </div>
      </div>
    </div>
  </div>







  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>