<form id="editExperienceForm" action="{{ route('update-experiences') }}" method="POST" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    @csrf
    @method('PUT')
                <div class="modal">
                    <div class="modal-content">
                        <h2>Create Experience</h2>
                        <span class="close-modal">×</span>
                        <hr>
                        <div>
                            <p>Company</p>
                            @error(Company)
                               <span class="text-red-500">{{ $company}}</span>
                            @enderror
                            <input type="text" name="company" id="nameCompany" value="{{ old('company') }}" />

                            <p>Period</p>
                            @error(period)
                                <span class="text-red-500 ">{{$period}}</span>
                            @enderror
                            <input type="text" name="period" id="namePeriod" value="{{ old('period') }}" />

                            <p>Position</p>
                            @error(position)
                                <span class="text-red-500 ">{{$position}}</span>
                            @enderror
                            <input type="text" name="position" id="namePosition" value="{{ old('position') }}" />
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button class="close-modal">Cancel</button>
                            <button class="secondary close-modal">

                                 <span id="saveButtonText"><i class="fa fa-spinner fa-spin"></i>edit</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <script>
    document.addEventListener('DOMContentLoaded', () => {
        const editButtons = document.querySelectorAll('.open-edit-modal');
        const editForm = document.getElementById('editExperienceForm');

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Affiche la modale
                editForm.classList.remove('hidden');

                // Remplis les champs
                document.getElementById('editId').value = button.dataset.id;
                document.getElementById('editCompany').value = button.dataset.company;
                document.getElementById('editPeriod').value = button.dataset.period;
                document.getElementById('editPosition').value = button.dataset.position;
            });
        });

        // Fermer la modale
        const closeButtons = document.querySelectorAll('.close-edit-modal');
        closeButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                editForm.classList.add('hidden');
            });
        });
    });
</script>
