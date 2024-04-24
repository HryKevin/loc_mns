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
                <li><a href="/"> <img src="assets/img/computer.svg" />Matériels</a></li>
                <li><a href="/"> <img src="assets/img/bell.svg" />Notifications</a></li>
                <li><a href="/"> <img src="assets/img/users.svg" />Utilisateurs</a></li>
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
            <h1>Accueil</h1>
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
        <div><a href="/">Gérer <img src="assets/img/circles.svg" alt="logo gérer" /></a></div>
        <div class="container-table-users">
            <div class="">
    <nav aria-label="Page navigation ">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link"
                                href="<?= !empty($search) ? '/?search=' . $search . '&page=' . ($currentPage - 1) : '/?page=' . ($currentPage - 1) ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
            
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                <a class="page-link"
                                    href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $i : '/?page=' . $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
            
                        <li class="page-item <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                            <a class="page-link"
                                href="<?= !empty($search) ? '/?search=' . $search . '&page=' . ($currentPage + 1) : '/?page=' . ($currentPage + 1) ?>"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
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
                <?php foreach ($users as $user) :?>
                    <tr>
                        <td><?= $user['lastname']?></td>
                        <td><?= $user['firstname']?></td>
                        <td><?= $user['email']?></td>
                        <td><?= $user['id_role']?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>

        </table>
      </div>
      </div>
    </div>
        </div>


    </div>
</div>