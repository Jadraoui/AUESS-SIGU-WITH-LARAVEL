@extends('layouts.espace')

@section('content')

 <div class="container">
     <div class="row">
         <div class="col-md-12">
            <h1>Liste des profils</h1>
            <div class="pull">
                   
            </div>                    <br>
            
            <table  class="table table-striped table-bordered" style="width:1100px; border:5px white solid;" >
               <head> 
                <tr>
                    <th style="width:5%">Id</th>

                    <th style="" >Intitulé</th>
                    <th style="width:50%">Description</th>
                    <th style="">date de création</th>
                    
                </tr>
               </head>
               <body>

                    @foreach($profils as $pro)
                        
                   <tr>
                       <td>{{ $pro->id}}</td>
                   <td>{{ $pro->intitule}}</td>
                       <td>{{ $pro->description}}</td>
                       <td>{{ $pro->created_at}}</td>
                       <td>
                          
                            @can('admin') 

                                                      
                                <a href="{{url('profil/'.$pro->id.'/edit')}}" class='btn btn-info'><i class="fa fa-edit"></i></a>

                        </td>
                       @endcan
                   </tr>                    
                   @endforeach

               </body>
            </table>
        </div>
     </div>
 </div>
    
@endsection