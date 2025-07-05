@extends('layouts.admin.layout-admin')

@section('content')
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





    <main x-data="testimonialHandler()">


        <!--==================== PROJECTS ====================-->

        <section class="testimonials" id="projects">
            <div class="titlebar">
                <h1>Testimonials</h1>
                <button class="btn__open--modal" @click="showCreateModal = true">New Testimonial</button>
            </div>

            <!-- Table -->
            <div class="table">
                <div class="table-search">
                    <input type="text" class="search-input" placeholder="Search Testimonial...">
                </div>

                <div class="testimonial_table-heading">
                    <p>Photo</p>
                    <p>Name</p>
                    <p>Function</p>
                    <p>Testimony</p>
                    <p>Rating</p>
                    <p>Actions</p>
                </div>

                @foreach ($testimonials as $testimonial)
                    <div class="testimonial_table-items">
                        <p>
                            <img src="{{ asset('storage/' . $testimonial->photo) }}" class="testimonial_img-list" />
                        </p>
                        <p>{{ $testimonial->name }}</p>
                        <p>{{ $testimonial->function }}</p>
                        <p>{{ \Illuminate\Support\Str::limit($testimonial->testimony, 50) }}</p>
                        <p>{{ $testimonial->rating }}/5</p>
                        <div class="flex space-x-2 items-center">
                            <button type="button" class="btn-icon success p-2 bg-green-400 rounded"
                                @click="openEditModal({
        id: {{ $testimonial->id }},
        name: '{{ addslashes($testimonial->name) }}',
        function: '{{ addslashes($testimonial->function) }}',
        testimony: `{{ addslashes($testimonial->testimony) }}`,
        rating: {{ $testimonial->rating }},
        photo: '{{ asset('storage/' . $testimonial->photo) }}'
    })">
                                <i class="fas fa-pencil-alt"></i>
                            </button>



                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon danger p-2 bg-red-500 rounded"
                                    onclick="return confirm('Voulez-vous supprimer ce témoignage ?')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach

                {{ $testimonials->links() }}
            </div>
        </section>

        <!-- Modale Création -->
        <div x-show="showCreateModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded w-[500px] relative">
                <h2 class="text-xl mb-4">Créer un témoignage</h2>
                <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Nom</label>
                    <input type="text" name="name" x-model="form.name" class="input" required>

                    <label>Fonction</label>
                    <input type="text" name="function" x-model="form.function" class="input" required>

                    <label>Témoignage</label>
                    <textarea name="testimony" class="input" x-model="form.testimony" required></textarea>

                    <label>Note</label>
                    <input type="number" name="rating" x-model="form.rating" min="1" max="5" class="input"
                        required>

                    <label>Photo</label>
                    <input type="file" name="photo" @change="handleImageUpload($event)">
                    <template x-if="form.preview">
                        <img :src="form.preview" class="w-20 h-20 object-cover mt-2">
                    </template>

                    <div class="mt-4 flex justify-between">
                        <button type="button" @click="showCreateModal = false"
                            class="bg-gray-500 px-3 py-1 text-white rounded">Annuler</button>
                        <button type="submit" class="bg-green-600 px-3 py-1 text-white rounded">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modale Édition -->

        <!-- ✅ Edit Modal -->
        <!-- Modal Edit -->
        <div x-show="showEditModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 p-6 rounded w-[500px] relative">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Modifier le témoignage</h2>

                <form method="POST" :action="`/admin/testimonials/${editData.id}`" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white">Nom</label>
                        <input type="text" name="name" x-model="editData.name"
                            class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white">Fonction</label>
                        <input type="text" name="function" x-model="editData.function"
                            class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white">Témoignage</label>
                        <textarea name="testimony" x-model="editData.testimony"
                            class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white">Note</label>
                        <input type="number" name="rating" x-model="editData.rating" min="1" max="5"
                            class="mt-1 block w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-white">Photo</label>
                        <input type="file" name="photo" @change="previewEditImage" />
                        <template x-if="editData.imagePreview">
                            <img :src="editData.imagePreview" class="mt-2 rounded w-32 h-32 object-cover" />
                        </template>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Mettre à
                            jour</button>
                    </div>
                </form>
            </div>
        </div>







        <script src="//unpkg.com/alpinejs" defer></script>

        <script>
            function testimonialHandler() {
                return {
                    showCreateModal: false,
                    showEditModal: false,
                    editId: null,
                    form: {
                        name: '',
                        function: '',
                        testimony: '',
                        rating: 5,
                        photo: null,
                        preview: null,
                    },

                    openCreateModal() {
                        this.resetForm();
                        this.showCreateModal = true;
                    },

                    openEditModal(id, name, func, testimony, rating, photo) {
                        this.editId = id;
                        this.form.name = name;
                        this.form.function = func;
                        this.form.testimony = testimony;
                        this.form.rating = rating;
                        this.form.preview = photo ? `/storage/${photo}` : null;
                        this.showEditModal = true;
                    },

                    handleImageUpload(event) {
                        const file = event.target.files[0];
                        this.form.photo = file;

                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.form.preview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    },

                    resetForm() {
                        this.form = {
                            name: '',
                            function: '',
                            testimony: '',
                            rating: 5,
                            photo: null,
                            preview: null,
                        };
                    }
                };
            }


            document.addEventListener('alpine:init', () => {
                Alpine.data('testimonialHandler', () => ({
                    showCreateModal: false,
                    showEditModal: false,

                    editData: {
                        id: null,
                        name: '',
                        function: '',
                        testimony: '',
                        rating: 5,
                        photo: null
                    },

                    openEditModal(testimonial) {
                        this.editData = {
                            id: testimonial.id,
                            name: testimonial.name,
                            function: testimonial.function,
                            testimony: testimonial.testimony,
                            rating: testimonial.rating,
                            photo: testimonial.photo
                        };
                        this.showEditModal = true;
                    }
                }));
            });
        </script>

    </main>
@endsection
