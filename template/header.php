<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid">
        <a class="navbar-brand mb-0 h1" href="http://localhost/registro">Università</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=1">Attività Formative</a>
                </li>
                <?php if ($user[0]->ruolo == "Admin") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=2">Aggiungi Piani</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?page=3">Unità Didattiche</a>
                </li>
                <?php if ($user[0]->ruolo == "Admin") : ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=4">Collega Unità</a>
                    </li>
                <?php endif; ?>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Cerca" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Cerca</button>
            </form>
        </div>
    </div>
</nav>