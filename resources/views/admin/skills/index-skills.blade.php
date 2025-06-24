 @extends('layouts.admin.layout-admin')

 @section('content')
     <main>
         <section class="skills" id="skills">
             <div class="titlebar">
                 <h1>Skills </h1>
                 <button class="open-modal">New Skill</button>
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
                 <div class="table-search">
                     <div>
                         <select class="search-select" name="" id="">
                             <option value="">Filter Skills</option>
                         </select>
                     </div>
                     <div class="relative">
                         <input class="search-input" type="text" name="search" placeholder="Search Skill...">
                     </div>
                 </div>

                 <div class="skill_table-heading">
                     <p>Name</p>
                     <p>Proficiency</p>
                     <p>Service</p>
                     <p>Actions</p>
                 </div>

                 @foreach ($skills as $skill)
                     <div class="skill_table-items">
                         <p>{{ $skill->name }}</p>
                         <div class="table_skills-bar">
                             <span class="table_skills-percentage" style="width: {{ $skill->proficiency }}%"></span>
                             <strong> {{ $skill->proficiency }}%</strong>
                         </div>
                         @if ($skill->service)
                             <p> {{ $skill->service->name }}</p>
                         @else
                             <p></p>
                         @endif

                         <div>
                             <button class="btn-icon success" onclick="openEditModal({{ $skill->id }})">
                                 <i class="fas fa-pencil-alt p-2 text-green-500"></i>
                             </button>
                             <form action="{{ route('delete-skills', $skill->id) }}" method="POST" style="display:inline;"
                                 onsubmit="return confirm('Voulez-vous vraiment supprimer ce skill ?');">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn-icon danger p-2 text-red-500">
                                     <i class="far fa-trash-alt"></i>
                                 </button>
                             </form>
                         </div>
                     </div>
                 @endforeach

                 <div class="table-paginate">
                     <div class="pagination">
                         <a href="#" class="btn">&laquo;</a>
                         <a href="#" class="btn active">1</a>
                         <a href="#" class="btn">2</a>
                         <a href="#" class="btn">3</a>
                         <a href="#" class="btn">&raquo;</a>
                     </div>
                 </div>
             </div>
               
        {{-- <form id="skillForm" action="{{ route('store-skills')}}" method="POST">
            @csrf
            <div class="modal" id="skillModal">
                <div class="modal-content bg-white p-6 rounded-lg">
                    <h2>Create Skill</h2>
                    <span class="close-modal" onclick="closeModal()">×</span>
                    <hr>
                    <div>
                        <p>Name</p>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="name" id="nameInput" value="{{ old('name') }}" class="input border rounded-md w-full p-2" />

                        <p>Proficiency</p>
                        @error('proficiency')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="proficiency" id="proficiencyInput" value="{{ old('proficiency') }}" class="input border rounded-md w-full p-2" />

                        <p>Service</p>
                        @error('service_id')
                            <span class="text-red-500 text-sm">{{$message }}</span>
                        @enderror
                        <select name="service_id" id="serviceInput" class="inputSelect border rounded-md w-full p-2">
                            <option value="">Select a service</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                            @endforeach
                        </select>
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
        </form>
    </section> --}}
</main>

<script>
    // Fermer le modal
    function closeModal() {
        document.getElementById('skillModal').style.display = 'none';
    }
</script>
        
     </main>
 @endsection
