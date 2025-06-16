@extends('layouts.admin.layout-admin')

@section('content')



         <!--==================== MEDIAS SETTING ====================-->
        <section class="setting" id="setting">
            <div class="setting-wrapper">
                <div class="setting_nav ">
                   
                    <nav class="nav ml-32">
                        <div class="nav-setting-wrapper">
                            <div class="nav-list">
                                <ul class="nav-list-item-setting">
                                    <li>
                                        <a aria-current="page" href="/admin/abouts" class="router-link-active nav-active setting-link"><span><i class="fas fa-cog"></i></span><span>About Me</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav-list-item-setting">
                                    <li>
                                        <a aria-current="page" href="/admin/abouts" class="setting-link"><span><i class="fas fa-cog"></i></span><span>My social media</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>

                  <div class="card-wrapper">
                    <div class="wrapper_left">
                        <div class="card">
                            <h2>Social media</h2>
                            <div class="social_table-heading">
                                <p>Link</p>
                                <p>Icon</p>
                                <p></p>
                            </div>
                            <!-- item 1 -->
                            <div class="social_table-items">
                                <p>Backend Developer</p>
                                <button class="service_table-icon">
                                    <i class=" fas fa-pencil-alt"></i>
                                </button>
                                <button class=" danger" >
                                    delete
                                </button>
                            </div> 
                            <br>
                            <form action="">
                                <div class="social_table-heading">
                                    <p>Link</p>
                                    <span style="color:#006fbb;">(Find your icon class: Font Awesome)</span>
                                    <p></p>
                                </div>
                                <p></p>
                                <div class="social_table-items">
                                    <input type="text">
                                    <input type="text">
                                    <button>
                                        Add Media
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="wrapper_right hidden">
                           
                    </div>
                </div>
                
            </div>
        </section>
   

@endsection()
