@extends ('base')
@section ('main')
@parent
<p>Den här texten kommer från index.blade.php</p>
@endsection

@section ('footerText')
<h2>Egen text</h2>
<p>Text från index.blade.php</p>
@endsection