<?php
try {
    error_log("Script json.all-users.php appelé.");
    $nbParPage = 10;

    if (isset($_GET['pagination'])) {
        error_log("Pagination détectée.");
        $query = $dbh->query("SELECT COUNT(*) AS nbusers FROM users");
        $nbUsers = $query->fetch()['nbusers'];
        $nbPages = ceil($nbUsers / $nbParPage);
        $currentPage = intval($_GET['pagination']);
        $currentPage = max(1, min($currentPage, $nbPages));
        $start = ($currentPage - 1) * $nbParPage;

        // Filtrer les utilisateurs en fonction du rôle sélectionné
        $roleFilter = "";
        if (isset($_GET['role'])) {
            $roleFilter = "AND role.id_role = :role";
        }

        $query = $dbh->prepare("SELECT users.*, role.name_role 
                                FROM users 
                                LEFT JOIN role ON users.id_role = role.id_role 
                                WHERE 1 $roleFilter 
                                ORDER BY users.lastname ASC 
                                LIMIT :start, :nbParPage");
        $query->bindParam(':start', $start, PDO::PARAM_INT);
        $query->bindParam(':nbParPage', $nbParPage, PDO::PARAM_INT);

        // Lier le paramètre de rôle si présent
        if ($roleFilter !== "") {
            $roleId = intval($_GET['role']);
            $query->bindParam(':role', $roleId, PDO::PARAM_INT);
        }

        $query->execute();
    } else {
        error_log("Pagination non détectée. Utilisation des valeurs par défaut.");
        $query = $dbh->prepare("SELECT users.*, role.name_role 
                                FROM users 
                                LEFT JOIN role ON users.id_role = role.id_role 
                                ORDER BY users.lastname ASC 
                                LIMIT 10");
        $query->execute();
    }

    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    $result = [
        'users' => $data,
        'pagination' => [
            'currentPage' => $currentPage ?? 1,
            'nbPages' => $nbPages ?? 1
        ]
    ];

    echo json_encode($result);
} catch (PDOException $e) {
    echo json_encode(["error" => "Erreur de connexion à la base de données: " . $e->getMessage()]);
    die;
}
