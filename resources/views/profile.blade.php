@extends("layout")

@section("title")

profile
@endsection


@section("contents")
<h1>
	Profile view
</h1>
<h2>{{$myId}} === {{$myEmail}}</h2>

@foreach($info as $user)

{{$user}}<br>

@endforeach


	

	@if($age > 30)

<p>You are older </p>

@else
<p> you are younger</p>

	@endif
<p>my name is tanveer</p>
	.my name is tanveermy name is tanveermy name is tanveermy name is tanveermy name is tanveermy name is tanveermy name is tanveermy name is tanveer
@endsection




	




