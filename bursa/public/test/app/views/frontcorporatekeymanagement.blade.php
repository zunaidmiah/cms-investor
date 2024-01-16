@extends('layouts.front')
@section('content')

                    
   <!-- Info white-->
         
     
                           
                                 
               @foreach ($profiles as $k => $profile)
               <div class="info_white1 border_bottom">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span12">
                            @if($k == 0 && !empty($profieDates))
                             {{ Form::open(array('url' => '/investorrelations/corporateinformation/directorprofile','method' => 'post','name' => 'dirprofile', 'id' => 'dirprofile' )) }}       
                                 
                                     <p class="pull-right">View Year:
                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
                                 </p>  
                                 
                                 {{ Form::close() }}  
                             @endif
                            <div class="clearfix"></div>
                             <h2 class="red-title">{{ $profile->name }}</h2>
                            {{ $profile->content }}
                        </div>

                    </div>
                </div>
                    @if($k % 2 == 0)
                    <i class="icon-user right"></i>
                    @else
                    <i class="icon-user left"></i>
                    @endif
                
            </div>
           @endforeach
          <!-- End Info Resalt-->

		
@stop