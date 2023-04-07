<!doctype html>
<html lang="en">

	@section('content')

		<h2>Stations</h2>
        @foreach($items as $item)
		{{$item}}
        @endforeach
	@endsection
