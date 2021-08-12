@extends('index')
@section('main')
    @livewire('ecue-manager-component', ["ueSelected" => $id])
@endsection