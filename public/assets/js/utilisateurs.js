let tableUsers = document.querySelector("#tableUsers");
let roleAdmin = document.querySelector("#roleAdmin");
let loan = document.querySelector("#produit");

roleAdmin.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.all-users")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      // Sélectionne toutes les cellules <td> du tableau
      const tbody = document.querySelector("#tableUsers tbody ");
      const rows = tbody.querySelectorAll("tr");
      // Sélectionne toutes les cellules <td> du tableau
      const td = document.querySelectorAll("#tableUsers tbody td");

      // Supprime chaque cellule <td>
      td.forEach((td) => td.remove());

      json_resultat.forEach((value) => {
        const row = document.createElement("tr");

        const cellLastName = document.createElement("td");
        cellLastName.textContent = value.lastname;
        row.appendChild(cellLastName);

        const cellFirstName = document.createElement("td");
        cellFirstName.textContent = value.firstname;
        row.appendChild(cellFirstName);

        const cellEmail = document.createElement("td");
        cellEmail.textContent = value.email;
        row.appendChild(cellEmail);

        const cellRole = document.createElement("td");
        cellRole.textContent = value.name_role;
        row.appendChild(cellRole);

        const cellButtons = document.createElement("td");

        // Création des éléments pour les boutons
        const ul = document.createElement("ul");

        // Bouton Modifier
        const liEdit = document.createElement("li");
        const editButton = document.createElement("button");
        const editLink = document.createElement("a");
        editLink.href = `/?page=modifier-utilisateur&id=${value.id_users}`;
        const editImg = document.createElement("img");
        editImg.src = "assets/img/pen-writing-6.svg";
        editImg.className = "button-crud-users";
        editLink.appendChild(editImg);
        editLink.appendChild(document.createTextNode(" Modifier"));
        editButton.appendChild(editLink);
        liEdit.appendChild(editButton);
        ul.appendChild(liEdit);

        // Bouton Supprimer
        const liDelete = document.createElement("li");
        const deleteButton = document.createElement("button");
        const deleteLink = document.createElement("a");
        deleteLink.href = `/?page=supprimer-utilisateur&id=${value.id_users}`;
        const deleteImg = document.createElement("img");
        deleteImg.src = "assets/img/trash.svg";
        deleteImg.className = "button-crud-users";
        deleteLink.appendChild(deleteImg);
        deleteLink.appendChild(document.createTextNode(" Supprimer"));
        deleteButton.appendChild(deleteLink);
        liDelete.appendChild(deleteButton);
        ul.appendChild(liDelete);

        // Ajout de la liste non ordonnée à la cellule
        cellButtons.appendChild(ul);
        row.appendChild(cellButtons);

        // Ajouter les nouvelles lignes au tableau
        tbody.appendChild(row);
      });
    });
});
