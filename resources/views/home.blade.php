@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-xs-12">
            <div class="card">
                <div class="card-header">Data User</div>

                <div class="card-body">
                    @livewire('user')
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
