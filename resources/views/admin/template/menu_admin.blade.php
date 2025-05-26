<style>
    .hr-horizontal {
        background: rgba(0, 0, 0, 0);
        border: 0;
        height: 1px;
        margin: .5rem 0;
        background-image: -webkit-gradient(linear, left top, right top, from(transparent), color-stop(rgba(0, 0, 0, 0.4)), to(transparent));
        background-image: -webkit-linear-gradient(left, transparent, rgba(0, 0, 0, 0.4), transparent);
        background-image: -o-linear-gradient(left, transparent, rgba(0, 0, 0, 0.4), transparent);
        background-image: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.4), transparent);
    }
</style>
<ul class="metismenu" id="menu">

    <li>
        <b class="">Utility</b>
    </li>
    <li>
        <a href="/dashboard" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-networking"></i>
            <span class="nav-text">Dashboard</span>
        </a>
    </li>
    <li>
        @if (Auth::user()->role == 'admin')
            <a href="/akses" class="ai-icon" aria-expanded="false">
                <i class="flaticon-381-settings-2"></i>
                <span class="nav-text">Operator</span>
            </a>
    </li>
    <li>
        <hr class="hr-horizontal">
    </li>

    <li>
        <b class="">Vote</b>
    </li>
    <li>

        <a href="/penyelenggara" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-briefcase"></i>
            <span class="nav-text">Penyelenggara</span>
        </a>

    </li>
    <li>
        <a href="/event-acara" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-layer-1"></i>
            <span class="nav-text">Event (Acara)</span>
        </a>
    </li>
    <li>
        <a href="/finalis" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-user-2"></i>
            <span class="nav-text">Finalis</span>
        </a>
    </li>
    @endif

    <li>
        <hr class="hr-horizontal">
    </li>

    <li>
        <b class="">Report</b>
    </li>
{{-- 
    <li>
        <a href="/event-votes" class="ai-icon" aria-expanded="false">
            <i class="flaticon-381-notepad"></i>
            <span class="nav-text">Voters</span>
        </a>
    </li> --}}

    <li>
        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
            <i class="flaticon-381-compact-disc-1"></i>
            <span class="nav-text">Transaksi</span>
        </a>
        <ul aria-expanded="false">
            <li><a href="/event">Transaksi Event</a></li>
            <li><a href="/transaksi/all">Semua Transaksi</a></li>
        </ul>
    </li>

</ul>
<div class="add-menu-sidebar">
    <img src="{{ asset('xhtml') }}/images/calendar.png" alt="" class="me-3">
    <a href="workoutplan.html" class="font-w500 mb-0">Create Workout Plan Now</a>
</div>
<div class="copyright">
    <p><strong>Gymove Fitness Admin Dashboard</strong> © 2023 All Rights Reserved</p>
    <p>Made with <span class="heart"></span> by DexignZone</p>
</div>
