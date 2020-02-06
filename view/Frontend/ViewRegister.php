<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Se connecter</div>
                <div class="card-body">
                    <form action="/register" method="POST">
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Nom
                                d'utilisateur</label>
                            <div class="col-md-6">
                                <input type="text" id="username" class="form-control" name="username" required
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Adresse Email</label>
                            <div class="col-md-6">
                                <input type="text" id="username" class="form-control" name="username" required
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de
                                passe</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password"
                                       required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">Confirmez votre
                                mot de passe</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control"
                                       name="password_confirm"
                                       required>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>