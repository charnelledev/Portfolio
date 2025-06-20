<div class="main-modal " :class="showModal ? 'show' : ''">
                <div class="modal">
                    <h2>
                        <span v-if="editMode">Edit </span>
                        <span v-else>Create </span> Service
                    </h2>
                    <span @click="closeModal">×</span>
                    <hr>
                    <div>
                        <label>Service Name</label>
                        <small style="color: red" v-if="errors.name"><span>{{errors.name}}</span></small>
                        <input type="text" v-model="form.name" />

                        <label>Icon Class <span style="color:#006fbb;">(Find your suitable icon: Font
                                Awesome)</span></label>
                        <small style="color: red" v-if="errors.icon"><span>{{errors.icon}}</span></small>
                        <input type="text" v-model="form.icon" />

                        <label>Description</label>
                        <small style="color: red" v-if="errors.description"><span>{{errors.description}}</span></small>
                        <textarea cols="10" rows="5" v-model="form.description"></textarea>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <button @click="closeModal">Cancel</button>
                        <button class="secondary" @click="handleSave">
                            <span><i class="fa fa-spinner fa-spin" aria-hidden="true" v-if="isSubmit"></i></span>
                            Save
                        </button>
                    </div>
                </div>
   </div>