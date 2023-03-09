<h3 class="title text-center"><?php echo "Collega Unità"; ?></h3>
<br />
<div class="row justify-content-center">
    <div class="col-6 text-center">
        <form action="http://localhost/registro/function/setUnity.php" method="post">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="attività" name="attività">
                <label for="floatingInput">Codice dell'attività formativa</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="codice" name="unità">
                <label for="floatingInput">Codice dell'unità didattica</label>
            </div>

            <button type="submit" class="btn btn-outline-dark">Collega</button>
        </form>
    </div>
</div>
<br />
<div class="row justify-content-center">
    <div class="col-6 text-center">
        <form action="http://localhost/registro/function/updateUnity.php" method="post">

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="attività" name="attività">
                <label for="floatingInput">Codice dell'attività formativa</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="codice" name="unità">
                <label for="floatingInput">Codice della nuova unità didattica</label>
            </div>

            <button type="submit" class="btn btn-outline-dark" disabled>Modifica</button>
        </form>
    </div>
</div>