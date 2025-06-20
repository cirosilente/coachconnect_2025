@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5 pt-5">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 text-center">
            <div class="image-container">
                <img src="{{ asset('images/bodybuilding.jpg') }}" class="img-fluid rounded shadow" alt="Logo">
            </div>
            <h2 class="display-4 fw-bold text-body-emphasis mb-4">No gain no pain !</h2>
            <p class="lead mb-4 blockquote px-3">Non importa quale programma usi. Non conta quali integratori o quale attrezzatura usi, nulla di tutto questo conta. Ciò che conta è cosa hai dentro e a chi ti affidi.</p>
        </div>
    </div>
</div>
@endsection
