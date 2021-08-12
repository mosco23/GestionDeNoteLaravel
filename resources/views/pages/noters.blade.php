@extends('index')
@section('main')
    @livewire('note-manager-component', ["ecueSelected" => $id])
@endsection