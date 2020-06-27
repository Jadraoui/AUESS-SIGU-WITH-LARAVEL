@extends('layouts.espace')

@section('content')
<!-- Horizontal Form -->
<div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editer l'utilisateur numéro {{$user->id}}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('user/'.$user->id)}}" method="post"  >
          <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
            <div class="box-body"   >
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputEmail3" value="{{$user->name}}">
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail3" value="{{$user->email}}">
              </div>
            </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Profil</label>
            <div class="col-sm-10">
                <select  style="width:100%;height:35px;" name="profil_id">
                    @foreach(\App\Profil::all() as $pro);        
                        <option value="{{$pro->id}}">{{$pro->intitule}}</option>    
                            
                    @endforeach            
                </select>    
            </div>          
          </div>
          <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="password" id="inputEmail3">
                </div>
          </div>    
        

         

                      

        <br>
          <!-- /.box-body -->
          <div class="box-footer">
                  <a href="{{ url('user')}}" class='btn btn-info'>Annuler</a> 
                <button type="submit" class="btn btn-info pull-right" >Modifier</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
    
@endsection