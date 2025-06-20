   
   
   <form action="{{ url('admin/service/store') }}">

       @csrf
       
       <div class="modal ">
                <div class="modal-content">
                    <h2>Create Service</h2>
                    <span class="close-modal">×</span>
                    <hr>
                    <div>
                        <label>Service Name</label>
                        <input type="text" />

                        <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>

                        <input type="text" />

                        <label>Description</label>
                        <textarea cols="10" rows="5"></textarea>
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

   
</form>