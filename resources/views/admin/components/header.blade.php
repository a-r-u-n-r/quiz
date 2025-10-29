<div class="header">
    <button id="toggleBtn" class="toggle-btn"><i class="fas fa-bars"></i></button>&nbsp;
    <div class="brand me-atuo">クイズ・ゲーム-Online Quiz System</div>
    <div class="user-actions">
        <!-- User Dropdown -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-user-tie"></i> | <span>{{ auth()->user()->name }}</span></button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>