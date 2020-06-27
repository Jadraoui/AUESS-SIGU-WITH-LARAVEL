@extends('layouts.espace')

@section('content')
<!-- Horizontal Form -->
<div class="box box-info" style="width:90%; margin-left:2%;">
        <div class="box-header with-border">
          <h3 class="box-title">Editer le Profile</h3>
          <a href="{{ url('changePassword')}}" style="margin-left:70%;">changer le mot de passe</a>

        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('user_profil/'.Auth::user()->id)}}" method="post"  >
          <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
            <div class="box-body"   >
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nom</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="inputEmail3" value="{{Auth::user()->name}}">
              </div>
            </div>
            
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="inputEmail3" value="{{Auth::user()->email}}">
              </div>
            </div>  

            <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
              <label for="new-password" class="col-sm-2 control-label">Le mot de passe actuel</label>  
            <div class="col-md-6">
              <input id="current-password" type="password" class="form-control" name="current-password" required>

              @if ($errors->has('current-password'))
                  <span class="help-block">
                  <strong>{{ $errors->first('current-password') }}</strong>
              </span>
              @endif
          </div>             
         
        

         

                      

        <br><br>
          <!-- /.box-body -->
          <div class="box-footer">
                  <a href="{{ url('/')}}" class='btn btn-info'>Annuler</a> 
                <button type="submit" class="btn btn-info pull-right" >Modifier</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
    
@endsection