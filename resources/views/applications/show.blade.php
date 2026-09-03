@extends('layouts.app')

@section('meta_title', $industry->meta_title ?? ($industry->name.' - MasterLube'))
@section('meta_description', $industry->meta_description ?? \App\Models\Setting::get('default_meta_description'))

@section('content')
    <x-industry-page :industry="$industry" :all="$all" />

    <x-ui.resource-pill-bar />
@endsection
