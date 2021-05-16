@extends('layouts.admin')
@section('content')
<datoteke-stavki-saziva :id="{{$id}}" :id_datoteke="{{$id_datoteke}}"></datoteke-stavki-saziva>
@endsection