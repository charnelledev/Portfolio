@extends('layouts.admin.layout-admin')

@section('content')
    <main>
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <div x-data="projectHandler()" x-cloak>
            {{-- Alertes succès / erreur --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                    class="mb-4 p-4 rounded text-white bg-green-600 shadow transition-opacity duration-500">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                    class="mb-4 p-4 rounded text-white bg-red-600 shadow transition-opacity duration-500">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Projects Section -->
            <section class="projects" id="projects">
                <div class="titlebar">
                    <h1>Projects</h1>
                    <button class="btn__open--modal bg-indigo-600 text-white px-4 py-2 rounded"
                        @click="openCreateModal()">New Project</button>
                </div>

                <div class="table">
                    <!-- Filter & Search -->
                    <div class="table-filter">
                        <ul class="table-filter-list">
                            <li>
                                <p class="table-filter-link link-active">All</p>
                            </li>
                        </ul>
                    </div>
                    <div class="table-search">
                        <select class="search-select" name="">
                            <option value="">Filter Project</option>
                        </select>
                        <input class="search-input" type="text" name="search" placeholder="Search Project...">
                    </div>

                    <!-- Table Headings -->
                    <div class="project_table-heading grid grid-cols-5 gap-4 font-semibold border-b pb-2">
                        <p>Image</p>
                        <p>Title</p>
                        <p>Description</p>
                        <p>Link</p>
                        <p>Actions</p>
                    </div>

                    <!-- Table Items -->
                    @forelse($projects as $project)
                        <div class="project_table-items grid grid-cols-5 gap-4 items-center border-b py-2">
                            <p>
                                <img src="{{ $project->image ? asset('storage/' . $project->image) : asset('template/assets/img/no-image.png') }}"
                                    alt="Project Image" class="project_img-list w-16 h-16 object-cover rounded">
                            </p>
                            <p>{{ $project->title }}</p>
                            <p>{{ Str::limit($project->description, 40) }}</p>
                            <p><a href="{{ $project->link }}" target="_blank" class="text-blue-600 underline">Visit</a></p>
                            <!-- Remplacer le <p> par un div -->
                            <div class="flex space-x-2 items-center">
                                <button class="btn-icon success p-2 bg-green-400 rounded"
                                    @click="openEditModal({{ $project->id }}, '{{ addslashes($project->title) }}', '{{ addslashes($project->description) }}', '{{ $project->link }}')">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>

                                <form action="{{ route('delete-projects') }}" method="POST"
                                    onsubmit="return confirm('Voulez-vous vraiment supprimer ce projet ?');"
                                    class="inline-block m-0 p-0">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $project->id }}">
                                    <button type="submit" class="btn-icon danger p-2 bg-red-500 rounded">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    @empty
                        <div class="text-center p-4 text-gray-500 col-span-5">Aucun projet trouvé.</div>
                    @endforelse

                    <!-- Pagination -->
                    <div class="table-paginate mt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </section>

            <!-- Modal Creation -->
            <div x-show="isCreateOpen" x-transition
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-3xl p-6 relative">
                    <button @click="closeCreateModal()"
                        class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
                    <h2 class="text-2xl font-semibold mb-4 text-center">Créer un nouveau projet</h2>
                    <form action="{{ route('store-projects') }}" method="POST" enctype="multipart/form-data"
                        class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        <div class="flex flex-col space-y-2">
                            <label for="title">Titre</label>
                            <input type="text" name="title" class="border p-2 rounded" required>
                            @error('title')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror

                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="border p-2 rounded" required></textarea>
                            @error('description')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror

                            <label for="link">Lien</label>
                            <input type="url" name="link" class="border p-2 rounded">
                            @error('link')
                                <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col space-y-4 items-center justify-center">
                            <img src="{{ asset('template/assets/img/no-image.png') }}"
                                class="w-48 h-48 object-cover rounded shadow" alt="Preview">
                            <input type="file" name="image" accept="image/*">
                        </div>
                        <div class="col-span-2 text-right">
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">💾
                                Enregistrer le projet</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal Edition -->
            <div x-show="isEditOpen" x-transition
                class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-3xl p-6 relative">
                    <button @click="closeEditModal()"
                        class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-xl">&times;</button>
                    <h2 class="text-2xl font-semibold mb-4 text-center">Modifier le projet</h2>
                    
                    <form :action="`{{ url('admin/projects') }}/${editProjectId}`" method="POST"
                        enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col space-y-2">
                            <label for="editTitle">Titre</label>
                            <input type="text" id="editTitle" name="title" x-model="editProjectData.title"
                                class="border p-2 rounded" required>
                            <label for="editDescription">Description</label>
                            <textarea id="editDescription" name="description" rows="5" x-model="editProjectData.description"
                                class="border p-2 rounded" required></textarea>
                            <label for="editLink">Lien</label>
                            <input type="url" id="editLink" name="link" x-model="editProjectData.link"
                                class="border p-2 rounded">
                        </div>
                        <div class="flex flex-col space-y-4 items-center justify-center">
                            <template x-if="editProjectData.imagePreview">
                                <img :src="editProjectData.imagePreview" class="w-48 h-48 object-cover rounded shadow"
                                    alt="Preview">
                            </template>
                            <template x-if="!editProjectData.imagePreview">
                                <img src="{{ asset('template/assets/img/no-image.png') }}"
                                    class="w-48 h-48 object-cover rounded shadow" alt="No image">
                            </template>
                            <input type="file" name="image" accept="image/*" @change="previewImage($event)">
                        </div>
                        <div class="col-span-2 text-right">
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">💾
                                Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="//unpkg.com/alpinejs" defer></script>

    <script>
        function projectHandler() {
            return {
                isCreateOpen: false,
                isEditOpen: false,
                editProjectId: null,
                editProjectData: {
                    title: '',
                    description: '',
                    link: '',
                    imagePreview: null,
                },

                openCreateModal() {
                    this.isCreateOpen = true;
                },

                closeCreateModal() {
                    this.isCreateOpen = false;
                },

                openEditModal(id, title, description, link) {
                    this.editProjectId = id;
                    this.editProjectData.title = title;
                    this.editProjectData.description = description;
                    this.editProjectData.link = link;
                    this.editProjectData.imagePreview = null; // reset image preview
                    this.isEditOpen = true;
                },

                closeEditModal() {
                    this.isEditOpen = false;
                    this.editProjectId = null;
                    this.editProjectData = {
                        title: '',
                        description: '',
                        link: '',
                        imagePreview: null,
                    };
                },

                previewImage(event) {
                    const input = event.target;
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = e => {
                            this.editProjectData.imagePreview = e.target.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            }
        }
    </script>
@endsection
