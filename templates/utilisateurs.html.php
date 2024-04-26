<div class="container-index">
    <div class="left-section-index">
        <!-- Menu Latéral -->
        <div>
            <div class="logo-section-sidebar">
                <img src="assets/img/logo_computer_locmns.svg" alt="logo-computer" />
                <img src="assets/img/logo_locmns.svg" alt="logo" />
            </div>
            <ul>
                <li><a href="/"> <img src="assets/img/house.svg" />Accueil</a></li>
                <li><a href="/?page=materiels"> <img src="assets/img/computer.svg" />Matériels</a></li>
                <li><a href="/"> <img src="assets/img/bell.svg" />Notifications</a></li>
                <li><a href="/?page=utilisateurs"> <img src="assets/img/users.svg" />Utilisateurs</a></li>
                <li><a href="/"> <img src="assets/img/gear.svg" />Réglages</a></li>
            </ul>
        </div>
        <div><a href="/"><img src="assets/img/door.svg" />
                Déconnexion</a>
        </div>
    </div>
    <div class="rigth-section-index">
        <!-- Nav -->
        <div class="nav-bar">
            <h1><?= $title ?></h1>
            <div>
                <input class="input-search" type="text" /></input>
                <img class="search" src="assets/img/magnifier.svg" />
                <img src="assets/img/user.svg" />
                <img src="assets/img/chevron-down.svg" />
            </div>
        </div>
        <!-- MAIN -->
        <div class="container-main-index">
            <div class="container-main-users">
                <div class="top-container-users"></div>
                <div class="container-users">
                    <div class="handle-users"><a href="/?page=gerer-users">Gérer <img src="assets/img/circles.svg" alt="logo gérer" /></a></div>
                    <div class="container-table-users">
                        <table class="show_users">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['lastname'] ?></td>
                                        <td><?= $user['firstname'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['id_role'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="pagination">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <?php
                                    // Générer les liens de pagination
                                    for ($i = 1; $i <= $nbPages; $i++) {
                                        // Construire l'URL pour la pagination
                                        $paginationURL = '/?page=utilisateurs&pagination=' . $i;
                                        // Ajouter les paramètres de recherche si disponibles
                                        if (!empty($searchQuery)) {
                                            $paginationURL .= '&' . $searchQuery;
                                        }
                                        ?>
                                        <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                            <a class="page-link" href="<?= $paginationURL ?>"><?= $i ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
</div>