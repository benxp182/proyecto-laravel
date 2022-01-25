@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{route ('Consult')}}" method="POST">
        @csrf
        <!--validar si el registro es valido-->
        @if(session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif
        @error('num')
        <h6 class="alert alert-danger">{{$message}}</h6>
        @enderror
        <!--vista para el usuario-->
        <div class="mb-3">
          <label type='int' for="title" class="form-label">PARAMETRO NUMERICO</label>
          <input type="decimal" name="num" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Consulta</button>
      </form>

      <!--Vista para mostar registro-->
      <div>
        @foreach ($consul as $consu)

        <!--edicion de registro-->
            <div class="row py-1">
              <table class="table table-bordered col-md-9 d-flex align-items-center">
                <thead>
                  <tr>
                    <td>
                <a href="{{route('consul-edit', ['id'=>$consu->id])}}" ><p>►►</p></a></td> 
                    </td>
                    <td>
                <a href="{{route('consul-edit', ['id'=>$consu->id])}}">{{$consu->num}}</a></td>
                <td>
                <a href="{{route('consul-edit', ['id'=>$consu->id])}}">{{$consu->created_at}}</a></td>
                <td>
                <a href="{{route('consul-edit', ['id'=>$consu->id])}}">{{$consu->updated_at}}</a></td>
                  </tr> 
                </thead>
              </div>
        <!--eliminar de registro-->
              <div class="col-m-3 d-flex justify-content-end">
                <form action="{{route('consul-destroy', [$consu->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                <button class='btn btn btn-danger btn-sm'>Eliminar</button>
                </form>
              </div>

            </div>
        @endforeach
      </div>
</div>    
@endsection