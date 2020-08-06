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

                    @if(Session::has('contactAdded'))

                    <div class="alert alert-success">
                        
                        {{Session::get('contactAdded')}}

                    </div>

                    @endif

<a href="contacts/create" class="btn btn-primary">Add Contact</a>&nbsp;&nbsp;&nbsp;
<a href="{{ route('home') }}" class="btn btn-primary">Back to home</a>

<br><br>

@if(count($contacts) > 0)

<table class="table">
    
<thead>
    <tr>
        
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Cover Image</th>
<th>Edit</th>
<th>Delete</th>

    </tr>

</thead>
<tbody>
    
@foreach($contacts as $contact)

<tr>
    
<td>{{$contact->name}}</td>
<td>{{$contact->email}}</td>
<td>{{$contact->phone}}</td>
<td>
<img  src="/public/cover_image/{{$contact->cover_image}}" alt=""></td>

<td><a href="contacts/{{$contact->id}}/edit" class="btn btn-warning">Edit</a></td>
<td><form action="{{ route('contacts.destroy', [ 'contact' => $contact->id ])}}" method="POST">



    
    @csrf
    @method("DELETE")
    <input type="submit" value="Delete" class="btn btn-danger">
</form>

</td>



</tr>

@endforeach

</tbody>

</table>

{{$contacts->links()}}

@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
