@extends('layout.main')

@section('content')


    <h3>New client</h3>
    <form method="POST" action="{{route('client.store')}}" style="margin-bottom: 20px;">
          @csrf
          <div class="form-group">
              <label>Nom :</label>
              <input class="form-control" type="text" name="nom">
          </div>
          @error('nom')
            <span class="text-danger">{{$message}}</span>
          @enderror

        <div class="form-group">
            <label>Prenom:</label>
            <input class="form-control" type="text" name="prenom">
        @error('prenom')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label>CNI</label>
            <input class="form-control" type="text" name="CNI">
        </div>

        <div class="form-group">
            <label>Adresse</label>
            <input class="form-control" type="text" name="adresse">
            @error('adresse')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Date de naissance</label>
            <input class="form-control" type="date" name="date_naissance">
            @error('date_naissance')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
         <button class="btn btn-success mt-3" type="submit">Enregistrer</button>
    </form>
    
@endsection
