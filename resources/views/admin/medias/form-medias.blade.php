 
 
 <form action="{{ url('admin/medias/store') }}" method="POST">
   
@csrf
                    <div class="social_table-heading">
                        <div>
                            
                            @error('link')
                            <p>Link</p>
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                     <div>
                         <span style="color:#006fbb;">(Find your icon class: Font Awesome)</span>
                         @error('icon')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                       

                     </div>
                        <p></p>
                 </div>
                    <p></p>
                    <div class="social_table-items">
                        <input type="text" name="link" value="{{ old('link') }}">
                        <input type="text" name="icon" value="{{ old('icon') }}">
                        <button>
                            Add Media
                        </button>
                    </div>
        </form>