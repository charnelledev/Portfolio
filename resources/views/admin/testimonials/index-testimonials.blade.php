@extends('layouts.admin.layout-admin')

@section('content')
    <main>

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
                        <div>
                            <button class="btn-icon success" wire:click="edit({{ $testimonial->id }})">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            <form method="POST" action="{{ route('delete-testimonials'), $testimonial) }}">
                                @csrf @method('DELETE')
                                <button class="btn-icon danger" onclick="return confirm('Delete this testimonial?')">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach

                {{ $testimonials->links() }}
            </div>
        </section>

        <!--===================ADD testimonials ====================-->
        <section class="about">
            <div class="titlebar">
                <h1>Create Testimonial </h1>
                <button>Save Testimonial</button>
            </div>
            <div class="card-wrapper">
                <div class="wrapper_left">
                    <div class="card">
                        <label>Name</label>
                        <input type="text" />

                        <label>Function</label>
                        <input type="text" />

                        <label>Testimony</label>
                        <textarea cols="10" rows="5"></textarea>
                    </div>
                </div>

                <div class="wrapper_right">
                    <div class="card">
                        <img src="../../template/assets/img/avatar.jpg" class="avatar_img">
                        <input type="file" id="fileimg">
                    </div>
                </div>

            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save Testimonial</button>
            </div>
        </section>
        <!--===================EDIT Testimonial ====================-->
        <section class="about">
            <div class="titlebar">
                <h1>Edit Testimonial </h1>
                <button>Update Testimonial</button>
            </div>
            <div class="card-wrapper">
                <div class="wrapper_left">
                    <div class="card">

                        <label>Name</label>
                        <input type="text" />

                        <label>Function</label>
                        <input type="text" />

                        <label>Testimony</label>
                        <textarea cols="10" rows="5"></textarea>

                    </div>
                </div>

                <div class="wrapper_right">
                    <div class="card">
                        <label>Image</label>
                        <img src="../../template/assets/img/avatar.jpg" alt="" class="project_img">
                        <input type="file">
                        <br><br><br>
                    </div>
                </div>

            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Update Testimonial</button>
            </div>
        </section><br><br><br>

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
