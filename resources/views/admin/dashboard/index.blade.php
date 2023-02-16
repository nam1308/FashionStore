@extends('admin.layouts.main')
@section('content')
    @php
    @endphp
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Wellcome</strong> Project</h1>
        <form action="{{ route('admin.test') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <x-upload name="image[]" :values="$image" multiple="true" />
            <button type="submit">Submit</button>
        </form>

    </div>

@stop
