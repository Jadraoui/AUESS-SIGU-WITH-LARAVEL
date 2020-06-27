@extends('layouts.espace')

@section('content')
<!-- Horizontal Form -->
<div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Editer le profil numéro {{$pro->id}}</h3>
        </div>
        
                   
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{ url('profil/'.$pro->id)}}" method="post"  >
          <input type="hidden" name="_method" value="PUT">
         {{ csrf_field() }}
            <div class="box-body"   >
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Intitulé</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" name="intitule" id="inputEmail3" value="{{$pro->intitule}}">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Description</label>

              <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="desc" >   {{ $pro->description}}</textarea>
                </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
                  <a href="{{ url('profil')}}" class='btn btn-info'>Annuler</a> 
                <button type="submit" class="btn btn-info pull-right" >Modifier</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
    
@endsection