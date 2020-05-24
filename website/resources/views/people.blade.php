@extends ('base')
@section ('main')
@parent
<p>Den här texten kommer från people.blade.php</p>
@endsection

@section ('footerText')
<h2>People</h2>
@foreach ($persons as $person)
<p>{{ $person['name']}} ({{ $person['age'] }}) </p>
@endforeach
@endsection