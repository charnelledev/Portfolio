


@extends('layouts.admin.layout-admin')

@section('content')
<main>
   @if(session('success'))
       <div id="flash-message" class="bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
           {{ session('success') }}
       </div>
   @endif
   @if(session('error'))
       <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
           {{ session('error') }}
       </div>
   @endif

   <section class="educations" id="educations">
       <div class="titlebar">
           <h1>Educations</h1>
           <button class="open-modal">New Education</button>
       </div>

       <div class="table">
           <div class="education_table-heading">
               <p>Institution</p>
               <p>Period</p>
               <p>Degree</p>
               <p>Department</p>
               <p>Actions</p>
           </div>

           @foreach ($educations as $education)
           <div class="education_table-items">
               <p>{{ $education->institution }}</p>
               <p>{{ $education->period }}</p>
               <p>{{ $education->degree }}</p>
               <p>{{ $education->department }}</p>
               <div>
                   <button class="btn-icon success edit-education" data-id="{{ $education->id }}">
                       <i class="fas fa-pencil-alt p-2"></i>
                   </button>
                   <form action="{{ route('delete-educations') }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ?');" style="display:inline;">
                       @csrf
                       @method('DELETE')
                       <input type="hidden" name="id" value="{{ $education->id }}">
                       <button type="submit" class="btn-icon danger p-2 bg-red-500">
                           <i class="far fa-trash-alt"></i>
                       </button>
                   </form>
               </div>
           </div>
           @endforeach
       </div>

       <!-- EDUCATION MODAL -->
       <form id="educationForm" action="{{ route('store-educations') }}" method="POST">
           @csrf
           <input type="hidden" name="id" id="educationId">
           <div class="modal hidden" id="educationModal" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); justify-content:center; align-items:center;">
               <div class="modal-content bg-white p-6 rounded-lg w-[400px] max-w-[95%]">
                   <h2 id="modalTitle">Create Education</h2>
                   <span class="close-modal float-right text-2xl cursor-pointer" onclick="closeModal()">×</span>
                   <hr class="my-2">

                   <div class="space-y-2">
                       <label for="institution">Institution</label>
                       <input type="text" name="institution" id="institution" value="{{ old('institution') }}" required class="w-full border p-2 rounded" />
                       @error('institution')
                           <span class="text-red-500">{{ $message }}</span>
                       @enderror

                       <label for="period">Period</label>
                       <input type="text" name="period" id="period" value="{{ old('period') }}" required class="w-full border p-2 rounded" />
                       @error('period')
                           <span class="text-red-500">{{ $message }}</span>
                       @enderror

                       <label for="degree">Degree</label>
                       <input type="text" name="degree" id="degree" value="{{ old('degree') }}" required class="w-full border p-2 rounded" />
                       @error('degree')
                           <span class="text-red-500">{{ $message }}</span>
                       @enderror

                       <label for="department">Department</label>
                       <input type="text" name="department" id="department" value="{{ old('department') }}" required class="w-full border p-2 rounded" />
                       @error('department')
                           <span class="text-red-500">{{ $message }}</span>
                       @enderror
                   </div>

                   <hr class="my-2">
                   <div class="modal-footer flex justify-between mt-3">
                       <button type="button" class="close-modal bg-gray-300 px-4 py-2 rounded" onclick="closeModal()">Cancel</button>
                       <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">
                           <span id="saveButtonText">Save</span>
                       </button>
                   </div>
               </div>
           </div>
       </form>
   </section>
</main>

<script>
    function closeModal() {
        const modal = document.getElementById('educationModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
        resetForm();
    }

    function openModal() {
        const modal = document.getElementById('educationModal');
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    function resetForm() {
        const form = document.getElementById('educationForm');
        form.reset();
        document.getElementById('educationId').value = '';
        document.getElementById('modalTitle').innerText = 'Create Education';
        form.action = "{{ route('store-educations') }}";

         const oldMethod = form.querySelector('input[name="_method"]');
    if (oldMethod) {
        oldMethod.remove();
    }

        const methodInput = form.querySelector('input[name="_method"]');
        if (methodInput) methodInput.remove();
        document.getElementById('saveButtonText').innerText = 'Save';
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.open-modal').addEventListener('click', () => {
            resetForm();
            openModal();
        });

        document.querySelectorAll('.edit-education').forEach(button => {
            button.addEventListener('click', function() {
                let id = this.dataset.id;
                fetch(`{{ url('admin/educations/edit') }}/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('modalTitle').innerText = 'Edit Education';
                        document.getElementById('educationId').value = data.id;
                        document.getElementById('institution').value = data.institution;
                        document.getElementById('period').value = data.period;
                        document.getElementById('degree').value = data.degree;
                        document.getElementById('department').value = data.department;

                        const form = document.getElementById('educationForm');
                        form.action = "{{ route('update-educations') }}";

                        let methodInput = form.querySelector('input[name="_method"]');
                        if (!methodInput) {
                            methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            form.appendChild(methodInput);
                        }
                        methodInput.value = 'PUT';

                        openModal();
                    });
            });
        });
    });
</script>

<script src="../../template/assets/js/admin.js"></script>
@endsection
