@extends('layouts.admin.layout-admin')

@section('content')
    <main>
        @if (session('success'))
            <div id="flash-message"
                class="bg-green-100 border border-green-500 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif

        <section class="experiences" id="experiences">
            <div class="titlebar flex justify-between items-center mb-4">
                <h1 class="text-2xl font-semibold">Experiences</h1>
                <button class="open-modal bg-indigo-600 text-white px-4 py-2 rounded">New Experience</button>
            </div>

            <div class="table">
                <div class="experience_table-heading font-bold grid grid-cols-4 bg-gray-200 p-2">
                    <p>Company</p>
                    <p>Period</p>
                    <p>Position</p>
                    <p>Actions</p>
                </div>

                @foreach ($experiences as $experience)
                    <div class="experience_table-items grid grid-cols-4 border-b p-2 items-center">
                        <p>{{ $experience->company }}</p>
                        <p>{{ $experience->period }}</p>
                        <p>{{ $experience->position }}</p>
                        <div class="flex gap-2">
                            <!-- Bouton Edit -->
                            <button type="button" class="btn-icon success p-2 text-green-600"
                                onclick="openEditModal({{ $experience->id }}, '{{ $experience->company }}', '{{ $experience->period }}', '{{ $experience->position }}')">
                                <i class="fas fa-pencil-alt"></i>
                            </button>

                            <form action="{{ route('delete-experiences') }}" method="POST"
                                onsubmit="return confirm('Voulez-vous vraiment supprimer cette expérience ?');">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $experience->id }}">
                                <button type="submit" class="btn-icon danger p-2 text-red-600"><i
                                        class="far fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Modal -->
        <div id="experienceModal"
            class="modal hidden fixed inset-0 bg-black bg-opacity-50 z-50 justify-center items-center">
            <form id="experienceForm" action="{{ route('store-experiences') }}" method="POST"
                class="modal-content bg-white p-6 rounded shadow-lg relative w-[90%] max-w-md">
                @csrf

                <h2 class="text-xl font-bold mb-4">Create Experience</h2>
                <span class="close-modal absolute top-2 right-4 text-2xl cursor-pointer text-gray-500 hover:text-black"
                    onclick="closeModal()">×</span>
                <hr class="my-2">

                <div class="space-y-4">
                    <div>
                        <label>Company</label>
                        @error('company')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="company" class="w-full border p-2 rounded"
                            value="{{ old('company') }}">
                    </div>

                    <div>
                        <label>Period</label>
                        @error('period')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="period" class="w-full border p-2 rounded" value="{{ old('period') }}">
                    </div>

                    <div>
                        <label>Position</label>
                        @error('position')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        <input type="text" name="position" class="w-full border p-2 rounded"
                            value="{{ old('position') }}">
                    </div>
                </div>

                <div class="modal-footer mt-6 flex justify-end gap-4">
                    <button type="button" onclick="closeModal()" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Save</button>
                </div>
            </form>
        </div>

        <form id="editExperienceForm" action="{{ route('update-experiences') }}" method="POST" class="modal hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 justify-center items-center">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" id="editId">

    <div class="modal-content bg-white dark:bg-gray-800 p-4 rounded w-[90%] max-w-md">
        <h2 class="text-xl mb-4">Modifier l'Expérience</h2>
        <span class="close-modal cursor-pointer float-right text-xl" onclick="closeEditModal()">×</span>
        <hr class="my-2">

        <label>Company</label>
        <input type="text" name="company" id="editCompany" class="w-full p-2 mb-2 border rounded">

        <label>Period</label>
        <input type="text" name="period" id="editPeriod" class="w-full p-2 mb-2 border rounded">

        <label>Position</label>
        <input type="text" name="position" id="editPosition" class="w-full p-2 mb-4 border rounded">

        <div class="modal-footer flex justify-end space-x-2">
            <button type="button" class="close-modal px-4 py-2 bg-gray-300 rounded" onclick="closeEditModal()">Annuler</button>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Enregistrer</button>
        </div>
      </div>
     </form>
  </main> 
<script>
    function openEditModal(id, company, period, position) {
        document.getElementById('editId').value = id;
        document.getElementById('editCompany').value = company;
        document.getElementById('editPeriod').value = period;
        document.getElementById('editPosition').value = position;
        document.getElementById('editExperienceForm').classList.remove('hidden');
        document.getElementById('editExperienceForm').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editExperienceForm').classList.add('hidden');
        document.getElementById('editExperienceForm').classList.remove('flex');
    }

        function closeModal() {
            const modal = document.getElementById('experienceModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function openModal() {
            const modal = document.getElementById('experienceModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const openModalBtn = document.querySelector('.open-modal');
            if (openModalBtn) {
                openModalBtn.addEventListener('click', openModal);
            }
        });
    </script>

    <script src="../../template/assets/js/admin.js"></script>
@endsection
