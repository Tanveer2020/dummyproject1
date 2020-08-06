@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <h3>User Dashboard</h3>
                    <p>my contact project for beginner.
                my contact project for beginner.
                my contact project for beginner.</p>


<a href="contacts/create" class="btn btn-primary">Add Contact</a>
<a href="{{ url('contacts') }}" class="btn btn-primary">Show Contact</a>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
