 <div class="titlebar">
                    <h1>About Me</h1>
                    <button class="secondary">Save Changes</button>
                </div>
                <div class="card-wrapper">
                    <div class="wrapper_left">
                        <div class="card" >
                            <label>Full Name</label>
                            <input type="text"  value="{{ isset($about->name) ? $about->name: '' }}" name="name">
            
                            <label>Email</label>
                            <input type="email" value="{{ isset($about->email) ? $about->email: '' }}" name="email">
            
                            <label>Phone</label>
                            <input type="text" value="{{ isset($about->phone) ? $about->phone: '' }}" name="phone">
            
                            <label>Address</label>
                            <input type="text"value="{{ isset($about->address) ? $about->address: '' }}" name="address" >
            
                            <label>Description</label>
                            <textarea cols="10" rows="3"  >
                                {{ isset($about->description) ? $about->description: '' }}
                            </textarea>
                        </div>
                        <div class="card">
                            <label>Tagline</label>
                            <input type="text" value="{{ isset($about->tagline) ? $about->tagline: '' }}" name="tagline">
                        </div>
                        
                    </div>
                    <div class="wrapper_right">
                        <div class="card">
                            <label for="home_image"
                                 class="block mb-2 text-lg font-semibold text-white bg-[#22c55e] p-2 rounded-lg">Home Image

                            </label>
                            <img id="HomeImage-preview"
                             src="{{ isset($about->home_image)?  asset('storage/images/'.$about->home_image): asset('storage/images/avatar.jpg') }}" class="avatar_img">

                            <input type="file" id="fileimg" onchange="showHomeImageFile(event)"
                             class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:to-green-600-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition">  
                        </div>
                        <div class="card">
                              <label for="home_image"
                                 class="block mb-2 text-lg font-semibold text-white bg-[#22c55e] p-2 rounded-lg">Home Image

                            </label>
                            <img id="BannerImage-preview"
                            src="{{ isset($about->banner_image)?  asset('storage/images/'.$about->banner_image): asset('storage/images/avatar.jpg') }}"  class="avatar_img">
                            <input type="file" id="fileimg" onchange="showBannerImageFile(event)"
                             class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:to-green-600-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100 transition" >  
                        </div>
                        <div class="card">
                            <p>CV</p>
                            <input type="file" id="filecv" >    
                        </div>     
                    </div>
                </div>

                <script>
                    function showHomeImageFile (event) {
                        let input = event.target;
                        //quand il y as new devan un nom c'est linstance de l'objet
                        let reader = new FileReader();
                        reader.onload = function() {
                            let dataURL = reader.result;
                            let output = document.getElementById('HomeImage-preview');
                            output.src = dataURL;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                    function showBannerImageFile(event) {
                        let input = event.target;
                        //quand il y as new devan un nom c'est linstance de l'objet
                        let reader = new FileReader();
                        reader.onload = function() {
                            let dataURL = reader.result;
                            let output = document.getElementById('BannerImage-preview');
                            output.src = dataURL;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                </script>