<form class="row" method="post">
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="lastname">Nom&nbsp;:</label>
        <input class="form-control" type="text" name="lastname" id="lastname" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="firstname">Prénom&nbsp;:</label>
        <input class="form-control" type="text" name="firstname" id="lastname" placeholder="Bon" />
    </div>
    <div class="mx-1 my-1 form-floating col-6">
        <label class="form-label" for="address">Adresse&nbsp;:</label>
        <input class="form-control" type="text" name="address" id="address" />
    </div>
    <div class="mx-1 my-1 form-floating col-2">
        <label class="form-label" for="zipcode">Code postal&nbsp;</label>
        <input class="form-control" type="text" name="zipcode" id="zipcode" maxlength="5" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="city">Ville&nbsp;:</label>
        <input class="form-control" type="text" name="city" id="city" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="phone">Téléphone principal&nbsp;:</label>
        <input class="form-control" type="text" name="phone" id="phone" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="phone2">Téléphone secondaire&nbsp;:</label>
        <input class="form-control" type="text" name="phone2" id="phone2" />
    </div>
    <div class="mx-1 my-1 form-floating col-4">
        <label class="form-label" for="mail">E-mail&nbsp;:</label>
        <input class="form-control" type="email" name="mail" id="mail" />
    </div>
    <div class="mx-1 my-1 col-4">
        <?php include_once '../modules/select_spec.php'; ?>
    </div>
    <div class="mx-1 my-1 col-4">
        <input type="submit" value="Envoyer" class="btn btn-primary" />
    </div>
</form>
