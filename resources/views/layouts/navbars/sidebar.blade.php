<div class="sidebar"  data-color="blue" data-image="{{ asset('light-bootstrap/img/sidebar-3.jpg') }}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                BEWSYS
            </a>
        </div>
        <ul class="nav">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>{{ __("Dashboard") }}</p>
                </a>
            </li>
           @if(Auth()->user()->role_id ==1 )
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" aria-expanded="false">
                    <i>
                        <img src="{{ asset('light-bootstrap/img/laravel.svg') }}" style="width:25px">
                    </i>
                    <p>
                        {{ __('Access Control') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse"  id="laravelExamples">
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'user') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="nc-icon nc-single-02"></i>
                                <p>{{ __("User Profile") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("User Management") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'roles') active @endif">
                            <a class="nav-link" href="{{route('roles.index')}}">
                                <i class="nc-icon nc-circle-09"></i>
                                <p>{{ __("Roles") }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            @endif
            @if(Auth()->user()->role_id !=2 )
            <li class="nav-item @if($activePage == 'departments') active @endif">
                <a class="nav-link" href="{{route('departments.index', 'departments')}}">
                    <i class="nc-icon nc-notes"></i>
                    <p>{{ __("Departments") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'sections') active @endif">
                <a class="nav-link" href="{{route('sections.index', 'sections')}}">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>{{ __("Sections") }}</p>
                </a>
            </li>
            <li class="nav-item @if($activePage == 'questions') active @endif">
                <a class="nav-link" href="{{route('questions.index', 'Questions')}}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __("Questions") }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('scores.index', 'scores')}}">
                    <i class="nc-icon nc-alien-33"></i>
                    <p>{{ __("Scores") }}</p>
                </a>
            </li>

            @endif

               <li class="nav-item @if($activePage == 'evaluation') active @endif">
                <a class="nav-link" href="{{route('evaluation.create', 'evalaution')}}">
                <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __(" Evaluation") }}</p>
                </a>
            </li>
            <!-- <li class="nav-item @if($activePage == 'maps') active @endif">
                <a class="nav-link" href="{{route('page.index', 'maps')}}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __("Maps") }}</p>
                </a>
            </li> -->
         
           
        </ul>
    </div>
</div>
