@extends('index')
@section('main')
    @livewire('etudiant-manager-component', ["ueSelected" => $id])
@endsection