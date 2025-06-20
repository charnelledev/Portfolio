

<form action="{{ route('store-services') }}" method="POST">
    @csrf
    <div class="modal {{ $errors->any() ? 'open' : '' }}">
        <div class="modal-content">
            <h2>Create Service</h2>
            <span class="close-modal">×</span>
            <hr>

            <div>
                <label>Service Name</label>
                <input type="text" name="name" value="{{ old('name') }}" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label>Icon Class</label>
                <input type="text" name="icon" value="{{ old('icon') }}" />
                @error('icon')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

                <label>Description</label>
                <textarea name="description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <hr>
            <div class="modal-footer">
                <button type="button" class="close-modal">Cancel</button>
                <button type="submit" class="secondary">
                    <span><i class="fa fa-spinner fa-spin"></i></span> Save
                </button>
            </div>
        </div>
    </div>
</form>
