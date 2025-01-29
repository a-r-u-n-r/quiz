<!-- Sidebar -->
<div id="sidebar">
    <div class="sidebar-header hidden">.</div>
    <ul>
        <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.quizzes.index') }}"><i class="fa-solid fa-bars-progress"></i> Manage Question</a></li>
        <li><a href="{{ route('admin.quizzes.showAll') }}"><i class="fa-solid fa-file-circle-question"></i> Show All Quiz</a></li>
        <li><a href="{{ route('admin.quizzes.leaderboard') }}"><i class="fa-solid fa-chess-queen"></i> Leaderboard</a></li>
        <li><a href="{{ route('admin.reports.monthly.pdf') }}"><i class="fa-solid fa-users"></i> Report Download</a></li>
    </ul>
</div>
