  <!-- Header Section -->
  <div class="header">
    <div class="project-name">
      <i class="fas fa-trophy"></i> Quizify
    </div>
    <div class="user-profile dropdown btn btn-warning py-1">
      <span>{{ auth()->user()->name }}</span>
      <button class="btn btn-link text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"></button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a></li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item text-danger">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>