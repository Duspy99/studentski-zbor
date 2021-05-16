@extends('layouts.admin')
@section('content')
@if(Session::has('message'))
<dodaj-clana-saziva :id="{{$id}}" poruka="Uspješno dodan član!"></dodaj-clana-saziva>
@else

<dodaj-clana-saziva :id="{{$id}}"></dodaj-clana-saziva>
@endif
@endsection

