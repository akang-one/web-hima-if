<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">Simple header</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link active" aria-current="page">Home</a></li>
                <li class="nav-item"><a href="<?= site_url() ?>" class="nav-link">Program</a></li>
                <li class="nav-item"><a href="<?= site_url() ?>" class="nav-link">Kepengurusan</a></li>
                <li class="nav-item"><a href="<?= site_url() ?>" class="nav-link">Keanggotaan</a></li>
                <li class="nav-item"><a href="<?= site_url() ?>" class="nav-link">Pemilu</a></li>
                <li class="nav-item"><a href="<?= site_url('user') ?>" class="nav-link">Staff</a></li>
            </ul>
        </header>
    </div>