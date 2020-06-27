@extends('layouts.espace')


@section('content')

 <div class="container">
     <div class="row">
         <div class="col-md-12">
            <h1>Liste des utilisateurs</h1>
            <div class="pull">
                    @if( Auth::user()->profil_id==1)

            <a href="{{ url('register')}}" class='btn btn-info' style="margin-left:90%;"><i class="fa fa-user-plus"></i></a>
            @endif
    
        
        </div>
            <table class="table table-striped table-bordered" >
               <head> 
                <tr>
                    
                    <th>Nom</th>
                    <th>profil</th>
                    <th>email</th>
                    <th>date de création</th>
                    


                    

                </tr>
               </head>
               <body>
                    @foreach($user as $user)
                        @if($user->name!=Auth::user()->name )
                   <tr>
                       <td>{{ $user->name}}</td>
                     
                       
                      
                            <td>{{ $user->intitule}}</td>
                             

                       <td>{{ $user->email}}</td>


                       <td>{{ $user->created_at}}</td>

                       <td>
                           
                            @can('admin') 
                            <form action=" {{url('user/'.$user->id)}} " method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}                               
                                <a href="{{url('user/'.$user->id.'/edit')}}" class='btn btn-info'><i class="fa fa-edit"></i></a>

                                <button type="submit" class='btn btn-info'><i class="fa fa-remove"></i></button>
                           </form>
                        </td>
                             @endcan
                   </tr>       
                   @endif
             
                   @endforeach

               </body>
            </table>
        </div>
     </div>
 </div>
    
@endsection