<h3 class="text-center"><?php echo "Modifica unità"; ?></h3>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 text-center edit-form">
        <form method="post">
            <div class="mb-3">
                <label for="codice" class="form-label">Inserisci il codice dell'attività</label>
                <input type="text" class="form-control" name="attività">
            </div>
            <div class="mb-3">
                <label for="codice" class="form-label">Inserisci il codice dell'unità</label>
                <input type="text" class="form-control" name="codice">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Inserisci il nome dell'unità</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <button type="submit" class="btn btn-outline-dark">Aggiungi</button>
            <button type="submit" class="btn btn-outline-dark">Modifica</button>
        </form>
    </div>
    <div class="col-3"></div>
</div>