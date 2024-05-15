
        <!-- MAIN -->
        <div class="container-main-index">
            <div class="container-main-users">
                <div class="top-container-users"></div>
                <div class="container-users">
                    <div class="handle-users"><a href="/?page=ajouter-utilisateur">Ajouter un nouvel
                            utilisateur&nbsp;<img src="assets/img/circles.svg" alt="logo gérer" /></a></div>
                    <div class="container-table-users scroll-bar">
                        <table class="show_users">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['lastname'] ?></td>
                                        <td><?= $user['firstname'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['name_role'] ?></td>
                                        <td>
                                            <ul>
                                                <li><button><a href="<?= '/?page=modifier-utilisateur&id=' . $user['id_users'] ?>"><img class="button-crud-users"
                                                            src="assets/img/pen-writing-6.svg" /> Modifier</a></button></li>
                                                <li><button><a href="<?= '/?page=supprimer-utilisateur&id=' . $user['id_users'] ?>"><img class="button-crud-users"
                                                            src="assets/img/trash.svg" /> Supprimer</a></button></li>
                                                
                                            </ul>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                        <div class="pagination">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                    <!-- Bouton pour revenir à la première page -->
                                    <li class="page-item first-page">
                                        <a class="page-link" href="<?= '/?page=utilisateurs&pagination=1' ?>"
                                            aria-label="First">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <!-- Bouton pour revenir à la page précédente -->
                                    <li class="page-item previous-page">
                                        <a class="page-link"
                                            href="<?= '/?page=utilisateurs&pagination=' . ($currentPage - 1) ?>"
                                            aria-label="Previous">
                                            <span aria-hidden="true">&lt;</span>
                                        </a>
                                    </li>
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
                                    <!-- Bouton pour avancer d'une page -->
                                    <li class="page-item next-page">
                                        <a class="page-link"
                                            href="<?= '/?page=utilisateurs&pagination=' . ($currentPage + 1) ?>"
                                            aria-label="Next">
                                            <span aria-hidden="true">&gt;</span>
                                        </a>
                                    </li>
                                    <!-- Bouton pour aller à la dernière page -->
                                    <li class="page-item last-page">
                                        <a class="page-link" href="<?= '/?page=utilisateurs&pagination=' . $nbPages ?>"
                                            aria-label="Last">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                </div>
            </div>
        </div>
    </div>


</div>
</div>