@extends('index')
@section('main')
    @livewire('parcour-manager-component', ["annee_id" => $id])
@endsection