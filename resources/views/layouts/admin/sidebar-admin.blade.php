<aside>
    <nav>
        <div class="nav-wrapper">
            <span class="nav__close">
                <i class="fas fa-window-close"></i>
            </span>
            <div class="nav-list">
                <ul>
                    <li>
                        <a class="{{ (request()->is('/'))?'nav-active' : '' }}" href="{{ route('home-page') }}">
                            <span><i class="fas fa-laptop-code"> </i></span>
                            <span>portfolio</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('admin/dashboard'))?'nav-active' : '' }}" href="{{ route('admin-dashboard') }}">
                            <span><i class="fas fa-home"> </i></span>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a  class="{{ (request()->is('admin/abouts'))?'nav-active' : '' }}"
                        href="{{ route('edit-about') }}">
                            <span><i class="fas fa-user"> </i></span>
                            <span>About Me</span>
                        </a>
                    </li>
                    <li>
                        <a  class="{{ (request()->is('admin/medias'))?'nav-active' : '' }}"
                        href="{{ route('index-media') }}">
                            <span><i class="fas fa-user"> </i></span>
                            <span>Media</span>
                        </a>
                    </li>
                    <li>
                        <a  class="{{ (request()->is('admin/services'))?'nav-active' : '' }}" href="{{ route('index-services') }}">
                            <span><i class="fas fa-concierge-bell"> </i></span>
                            <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('admin/skills'))?'nav-active' : '' }}"
                             href="{{ route('index-skills') }}">
                            <span><i class="fas fa-lightbulb"></i></span>
                            <span>Skills</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('admin/educations'))?'nav-active' : '' }}" href="{{ route('index-educations') }}">
                            <span><i class="fas fa-graduation-cap"> </i></span>
                            <span>Educations</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('admin/experiences'))?'nav-active' : '' }}" href="{{ route('index-experiences') }}">
                            <span><i class="fas fa-briefcase"> </i></span>
                            <span>Experiences</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('admin/projects'))?'nav-active' : '' }}"
                        href="{{ route('index-projects') }}">
                            <span><i class="fas fa-tasks"> </i></span>
                            <span>Projects</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ (request()->is('admin/testimonials'))?'nav-active' : '' }}" href="{{ route('admin.testimonials.index') }}"
>
                            <span><i class="fas fa-comment-dots"> </i></span>
                            <span>Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a  href="message.html">
                            <span><i class="fas fa-envelope"> </i></span>
                            <span>Messages</span>
                        </a>
                    </li>
                    <li>
                        <a  href="user.html">
                            <span><i class="fas fa-users"> </i></span>
                            <span>Users</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <div class="nav-list">
                <ul>
                    <li>
                        <a href="setting.html">
                            <span><i class="fas fa-cog "> </i></span>
                            <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</aside>