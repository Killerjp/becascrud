@extends('layouts.plantillabase2')

@section('content')<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
       
                    @secre (session('status'))
        Eres la secre
                    @endsecre
                    <br><br>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
               
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                        
                            {{ session('status') }}
                        </div>
                    @endif
                    @admin (session('status'))
                        Eres administrador
                    @endadmin

                    {{ __('You are logged in!') }}


                    





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
