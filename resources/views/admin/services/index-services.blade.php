@extends('layouts.admin.layout-admin')

@section('content')
<main>
    @if (session('success'))
        <div id="flash-message" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            {{ session('error') }}
        </div>
    @endif

    <section class="services" id="services">
        <div class="titlebar">
            <h1>Services</h1>
            <button class="open-modal">New Service</button>
        </div>
        <div class="table">
            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">All</p>
                        </li>
                    </ul>
                </div>
            </div>
            <form action="get" action="">

        
         <div class="table-search">
                    <div>
                        <select class="search-select " name="" id="">
                            <option value="">Filter Service</option>
                        </select>
                    </div>
                    <div class="flex gap-5 ml-2 relative">

                        <input class="" type="text" name="name" placeholder="Rechercher le titre de service..."
                            value="">
                        <button class="min-w-30 h-12 ">Recherche</button>
                        <a href="{{ url('/admin/services') }}">
                            <button class="min-w-30 h-12">Réinitialiser</button>
                        </a>
                    </div>
         </div>
            <div class="service_table-heading">
                <p>Title</p>
                <p>Icon</p>
                <p>Description</p>
                <p>Actions</p>
            </div>
    </form>

            @foreach ($services as $service)
                <div class="service_table-items">
                    <p>{{ $service->name }}</p>
                    <button class="service_table-icon">
                        <i class="{{ $service->icon }}"></i>
                    </button>
                    <p>{{ $service->description }}</p>
                    <div>
                        <button class="btn-icon success" onclick="openEditModal({{ $service->id }})">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <form action="{{ route('delete-services', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce service ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-icon danger">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            {{-- <div class="table-paginate">
                <div class="pagination">
                    {{ $services->links()}}
                </div> --}}
                
            </div>
        </div>

        <!-- SERVICES MODAL -->
        {{-- <form id="serviceForm" action="{{ route('services.store') }}" method="POST">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" name="id" id="serviceId">
            <div class="modal" id="serviceModal">
                <div class="modal-content">
                    <h2 id="modalTitle">Create Service</h2>
                    <span class="close-modal" onclick="closeModal()">×</span>
                    <hr>
                    <div>
                        <label>Service Name</label>
                        @error('name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" id="nameInput" value="{{ old('name') }}" />

                        <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font Awesome)</span></label>
                        @error('icon')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <input type="text" name="icon" id="iconInput" value="{{ old('icon') }}" />

                        <label>Description</label>
                        @error('description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                        <textarea cols="10" rows="5" name="description" id="descriptionInput">{{ old('description') }}</textarea>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button type="button" class="close-modal" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="secondary">
                            <span id="saveButtonText"><i class="fa fa-spinner fa-spin"></i> Save</span>
                        </button>
                    </div>
                </div>
            </div>
        </form> --}}
    </section>
</main>


@endsection