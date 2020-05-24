@extends ('base')
@section ('main')
@parent
<p>Den här texten kommer från hello.blade.php</p>
@endsection

@section ('footerText')
<h2>Hello</h2>
@if ($name != null)
I believe your name is {{ $name }}
@else
I'm afraid I don't know your name.
@endif
@endsection