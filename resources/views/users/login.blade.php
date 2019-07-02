@extends('layouts.main-app')

@section('content')

<div class="row mt-5">
   <div class="col-md-8 mx-auto">
      <div class="card">
         <div class="card-body">
            <h3 class="card-title">Connexion</h3>
           <hr>
           <form method="post" action="{{route('user.auth')}}" >
               @csrf
               
                  <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email"  placeholder="Email">
                  <input type="hidden" name="_token" value="{{Session::token()}}">
                  </div>
               <div class="form-group">
                  <label for="password">Mot de passe </label>
                  <input type="password" class="form-control" name="Mot de passe" >
               </div>
               <button type="submit" class="btn btn-primary">Valider</button>
            </form>
         </div>
      </div>
   </div>
</div>


@endsection