<h3 class="text-center"><?php echo "Modifica attività"; ?></h3>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 text-center edit-form">
        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="codice" name="codice">
                <label for="floatingInput">Codice dell'attività</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="nome" name="nome">
                <label for="floatingInput">Nome dell'attività</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Aggiungi</button>
            <button type="submit" class="btn btn-outline-dark">Modifica</button>
        </form>
    </div>
    <div class="col-3"></div>
</div>