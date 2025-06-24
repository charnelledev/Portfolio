{{-- <main>
        
             <!--==================== SKILLS ====================-->
             <section class="skills" id="skills">
                <!-------------- SKILLS MODAL --------------->
                <div class="modal ">
                    <div class="modal-content">
                        <h2>Create Skill</h2>
                        <span class="close-modal">×</span>
                        <hr>
                        <div>
                            <p>Name</p>
                            <input type="text" class="input" />

                            <p>Proficiency</p>
                            <input type="text" class="input" />

                            <p>Service</p>
                            <select class="inputSelect" name="" id="">
                                <option value="">Front-end developer</option>
                                <option value="">Backend developer</option>
                            </select>
                        </div>
                        <hr>
                        <div class="modal-footer">
                            <button class="close-modal">
                                Cancel
                            </button>
                            <button class="secondary close-modal">
                                <span><i class="fa fa-spinner fa-spin"></i></span>
                              Save
                            </button>
                        </div>
                    </div>
                </div>
            </section>
        
    </main> --}}


<main>
    <!--==================== SKILLS ====================-->
    <section class="skills" id="skills">
        <!-------------- SKILLS MODAL --------------->
        <form id="skillForm" action="{{ route('skills.store') }}" method="POST">
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
                            <span class="text-red-500 text-sm">{{ $message }}</span>
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
    </section>
</main>

<script>
    // Fermer le modal
    function closeModal() {
        document.getElementById('skillModal').style.display = 'none';
    }
</script>

<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.5);
        justify-content: center;
        align-items: center;
    }
</style>
