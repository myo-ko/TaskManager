<? $hasResult = count($errors->all()) || session("status") ?>
@foreach ($errors->all() as $error)
    <p style="color: firebrick; font-size: 0.8em;">Warning: {{ $error }}</p>
@endforeach
@if (session("status"))
    <p style="color: steelblue; font-size: 0.9em;">{{ session("status") }}</p>
@endif
@if ($hasResult)
<div class="hr"></div>
@endif
