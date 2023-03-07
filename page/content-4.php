<h3 class="text-center"><?php echo "Collega Unità Didattiche"; ?></h3>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 text-center edit-form">
        <form action="function/api/setUnity.php" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="attività" name="attività">
                <label for="floatingInput">Codice dell'attività formativa</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="codice" name="unità">
                <label for="floatingInput">Codice dell'unità didattica</label>
            </div>
            <button type="submit" class="btn btn-outline-dark">Collega</button>
            <button type="submit" class="btn btn-outline-dark" disabled>Modifica</button>
        </form>
    </div>
    <div class="col-3"></div>
</div>