@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{route('consul-update', ['id'=>$consu->id])}}" method="POST">
        @method('PATCH')
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
          <label type='int' for="title" class="form-label">PARAMETRO</label>
          <input type="decimal" name="num" class="form-control" value="{{$consu->num}}" >
        </div>
        <button type="submit" class="btn btn-primary">Actualiar</button>
      </form>
  
</div>    
@endsection