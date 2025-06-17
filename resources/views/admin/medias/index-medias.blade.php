@extends('layouts.admin.layout-admin')

@section('content')
    <div class="p-10">
        <main>
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card">

                <h2>Social media</h2>
                <div class="social_table-heading">
                    <p>Link</p>
                    <p>Icon</p>
                    <p></p>
                </div>
                <!-- item 1 -->


                @foreach ($medias as $media)
                    <div class="social_table-items">
                        <a href="{{ $media->link }}" target="_blank">{{ $media->link }}</a>

                        <button class="service_table-icon">
                            <i class="{{ $media->icon }}"></i>
                        </button>

                        <form action="{{ route('delete-medias') }}" method="POST"
                            onsubmit="return confirm('Voulez-vous vraiment supprimer ce média ?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $media->id }}">
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                        </form>

                        {{-- <form action="{{ route('delete-medias') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $media->id }}">
                            <button type="submit">Delete</button>
                        </form> --}}

                    </div>
                @endforeach
                <br>
                @include('admin.medias.form-medias')
            </div>






        </main>
    </div>
@endsection()
