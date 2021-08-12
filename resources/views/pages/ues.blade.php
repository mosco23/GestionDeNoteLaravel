@extends('index')
@section('main')
    @livewire('ue-manager-component', ["parcour_id" => $id])
@endsection