
<form action="{{ route('store-services') }}" method="POST">
    @csrf
    <div class="modal">
        <div class="modal-content">
            <h2>Create Service</h2>
            <span class="close-modal">×</span>
            <hr>
            <div>
                <label>Service Name</label>
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <input type="text" name="name" value="{{ old('name') }}" />

                <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font Awesome)</span></label>
                @error('icon')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <input type="text" name="icon" value="{{ old('icon') }}" />

                <label>Description</label>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <textarea cols="10" rows="5" name="description">{{ old('description') }}</textarea>
            </div>
            <hr>
            <div class="modal-footer">
                <button class="close-modal">Cancel</button>
                <button type="submit" class="secondary">
                    <span><i class="fa fa-spinner fa-spin"></i></span>
                    Save
                </button>
            </div>
        </div>
    </div>
</form>