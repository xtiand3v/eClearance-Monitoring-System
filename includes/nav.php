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

                    <li class="sidebar-item <?= ($activePage == 'accounts') ? 'active':''; ?>">
                        <a class="sidebar-link" href="accounts.php">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Accounts</span>
                        </a>
                    </li>

                    <li class="sidebar-item <?= ($activePage == 'departments' || $activePage == 'department-view') ? 'active':''; ?>">
                        <a class="sidebar-link" href="departments.php">
                            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Departments</span>
                        </a>
                    </li>

                    <li class="sidebar-item <?= ($activePage == 'signatories' || $activePage == 'signatories-add') ? 'active':''; ?>">
                        <a class="sidebar-link" href="signatories.php?id=1">
                            <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Signatories</span>
                        </a>
                    </li>

                    <li class="sidebar-item <?= ($activePage == 'sections' || $activePage == 'section-add') ? 'active':''; ?>">
                        <a class="sidebar-link" href="sections.php">
                            <i class="align-middle" data-feather="book"></i> <span class="align-middle">Sections</span>
                        </a>
                    </li>

                </ul>

            </div>
        </nav>