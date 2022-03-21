<div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="index.php">
                    <span class="align-middle">Dashboard</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>

                    <li class="sidebar-item <?= ($activePage == 'index') ? 'active':''; ?>">
                        <a class="sidebar-link" href="index.php">
                            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Manage
                    </li>

                    <li class="sidebar-item <?= ($activePage == 'sections') ? 'active':''; ?>">
                        <a class="sidebar-link" href="sections.php">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Sections</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= ($activePage == 'subjects') ? 'active':''; ?>">
                        <a class="sidebar-link" href="subjects.php">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Subjects</span>
                        </a>
                    </li>


                </ul>

            </div>
        </nav>