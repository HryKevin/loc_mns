// Fonction pour créer l'en-tête du tableau avec des colonnes spécifiées
function createTableHeader(columns) {
  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.innerHTML = ""; // Clear existing header content
  const headerRow = document.createElement("tr");

  columns.forEach(column => {
    const th = document.createElement("th");
    th.textContent = column;
    headerRow.appendChild(th);
  });

  tableHeader.appendChild(headerRow);
}

// Sélection du bouton "Tout le matériel"
let allMaterials = document.querySelector("#allMaterials");

allMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.all-material")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      const tbody = document.querySelector("#myTable tbody");
      tbody.innerHTML = ""; // Supprimer toutes les lignes existantes

      // Définir les colonnes pour "Tout le matériel"
      const columns = ["Nom", "Description", "Numéro de série", "Marque", "Taille", "Processeur", "Stockage", "RAM", "Catégorie", "Actions"];
      createTableHeader(columns);

      json_resultat.forEach((value) => {
        const row = document.createElement("tr");

        const cellName = document.createElement("td");
        cellName.textContent = value.name_material;
        row.appendChild(cellName);

        const cellDescription = document.createElement("td");
        cellDescription.textContent = value.description;
        row.appendChild(cellDescription);

        const cellSerialNumber = document.createElement("td");
        cellSerialNumber.textContent = value.serial_number;
        row.appendChild(cellSerialNumber);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellSize = document.createElement("td");
        cellSize.textContent = value.screen_size;
        row.appendChild(cellSize);

        const cellProcessor = document.createElement("td");
        cellProcessor.textContent = value.processor;
        row.appendChild(cellProcessor);

        const cellStorage = document.createElement("td");
        cellStorage.textContent = value.storage_memory;
        row.appendChild(cellStorage);

        const cellRam = document.createElement("td");
        cellRam.textContent = value.ram;
        row.appendChild(cellRam);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        const cellButtons = document.createElement("td");
        const ul = document.createElement("ul");
        ul.className = "flex";

        // Ajout des boutons d'édition
        const liEdit = document.createElement("li");
        const editButton = document.createElement("button");
        const editLink = document.createElement("a");
        editLink.href = `/?page=modifier-materiel&id=${value.id_material}`;
        const editImg = document.createElement("img");
        editImg.src = "assets/img/pen-writing-6.svg";
        editButton.className = "flex-button";
        editLink.appendChild(editImg);
        editLink.appendChild(document.createTextNode(" Modifier"));
        editButton.appendChild(editLink);
        liEdit.appendChild(editButton);
        ul.appendChild(liEdit);

        // Ajout des boutons de suppression
        const liDelete = document.createElement("li");
        const deleteButton = document.createElement("button");
        const deleteLink = document.createElement("a");
        deleteLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const deleteImg = document.createElement("img");
        deleteImg.src = "assets/img/trash.svg";
        deleteButton.className = "flex-button";
        deleteLink.appendChild(deleteImg);
        deleteLink.appendChild(document.createTextNode(" Supprimer"));
        deleteButton.appendChild(deleteLink);
        liDelete.appendChild(deleteButton);
        ul.appendChild(liDelete);

        // Ajout des boutons de location
        const liLoan = document.createElement("li");
        const loanButton = document.createElement("button");
        const loanLink = document.createElement("a");
        loanLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const loanImg = document.createElement("img");
        loanImg.src = "assets/img/trash.svg";
        loanButton.className = "flex-button";
        loanLink.appendChild(loanImg);
        loanLink.appendChild(document.createTextNode(" Louer"));
        loanButton.appendChild(loanLink);
        liLoan.appendChild(loanButton);
        ul.appendChild(liLoan);
        cellButtons.appendChild(ul);
        row.appendChild(cellButtons);

        tbody.appendChild(row); // Ajouter la nouvelle ligne au tableau
      });
    });

  // Mise à jour de l'en-tête du tableau
  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.className = "thead-background";
});

// Sélection du bouton "Matériel emprunté"
let loanMaterials = document.querySelector("#loanMaterials");

loanMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.loan")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      const tbody = document.querySelector("#myTable tbody");
      tbody.innerHTML = ""; // Supprimer toutes les lignes existantes

      // Définir les colonnes pour "Matériel emprunté"
      const columns = ["Nom", "Description", "Numéro de série", "Marque", "Taille", "Processeur", "Stockage", "RAM", "Catégorie", "Date de début de location", "Date de fin de location", "Utilisateur", "Actions"];
      createTableHeader(columns);

      json_resultat.forEach((value) => {
        const row = document.createElement("tr");

        const cellName = document.createElement("td");
        cellName.textContent = value.name_material;
        row.appendChild(cellName);

        const cellDescription = document.createElement("td");
        cellDescription.textContent = value.description;
        row.appendChild(cellDescription);

        const cellSerialNumber = document.createElement("td");
        cellSerialNumber.textContent = value.serial_number;
        row.appendChild(cellSerialNumber);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellSize = document.createElement("td");
        cellSize.textContent = value.screen_size;
        row.appendChild(cellSize);

        const cellProcessor = document.createElement("td");
        cellProcessor.textContent = value.processor;
        row.appendChild(cellProcessor);

        const cellStorage = document.createElement("td");
        cellStorage.textContent = value.storage_memory;
        row.appendChild(cellStorage);

        const cellRam = document.createElement("td");
        cellRam.textContent = value.ram;
        row.appendChild(cellRam);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        const cellDateLoan = document.createElement("td");
        cellDateLoan.textContent = value.date_loan;
        row.appendChild(cellDateLoan);

        const cellDateReturn = document.createElement("td");
        cellDateReturn.textContent = value.date_return;
        row.appendChild(cellDateReturn);

        const cellUser = document.createElement("td");
        cellUser.textContent = value.firstname + " " + value.lastname;
        row.appendChild(cellUser);

        const cellButtons = document.createElement("td");
        const ul = document.createElement("ul");
        ul.className = "flex";

        // Ajout des boutons d'édition
        const liEdit = document.createElement("li");
        const editButton = document.createElement("button");
        const editLink = document.createElement("a");
        editLink.href = `/?page=modifier-materiel&id=${value.id_material}`;
        const editImg = document.createElement("img");
        editImg.src = "assets/img/pen-writing-6.svg";
        editButton.className = "flex-button";
        editLink.appendChild(editImg);
        editLink.appendChild(document.createTextNode(" Modifier"));
        editButton.appendChild(editLink);
        liEdit.appendChild(editButton);
        ul.appendChild(liEdit);

        // Ajout des boutons de suppression
        const liDelete = document.createElement("li");
        const deleteButton = document.createElement("button");
        const deleteLink = document.createElement("a");
        deleteLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const deleteImg = document.createElement("img");
        deleteImg.src = "assets/img/trash.svg";
        deleteButton.className = "flex-button";
        deleteLink.appendChild(deleteImg);
        deleteLink.appendChild(document.createTextNode(" Supprimer"));
        deleteButton.appendChild(deleteLink);
        liDelete.appendChild(deleteButton);
        ul.appendChild(liDelete);

        // Ajout des boutons de location
        const liLoan = document.createElement("li");
        const loanButton = document.createElement("button");
        const loanLink = document.createElement("a");
        loanLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const loanImg = document.createElement("img");
        loanImg.src = "assets/img/trash.svg";
        loanButton.className = "flex-button";
        loanLink.appendChild(loanImg);
        loanLink.appendChild(document.createTextNode(" Louer"));
        loanButton.appendChild(loanLink);
        liLoan.appendChild(loanButton);
        ul.appendChild(liLoan);

        cellButtons.appendChild(ul);
        row.appendChild(cellButtons);

        tbody.appendChild(row); // Ajouter la nouvelle ligne au tableau
      });
    });

  // Mise à jour de l'en-tête du tableau
  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.className = "thead-background-loan";
});

// Sélection du bouton "Matériel disponible"
let availableMaterials = document.querySelector("#availableMaterials");

availableMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.available-material")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      const tbody = document.querySelector("#myTable tbody");
      tbody.innerHTML = ""; // Supprimer toutes les lignes existantes

      // Définir les colonnes pour "Matériel disponible"
      const columns = ["Nom", "Description", "Numéro de série", "Marque", "Taille", "Processeur", "Stockage", "RAM", "Catégorie", "Actions"];
      createTableHeader(columns);

      json_resultat.forEach((value) => {
        const row = document.createElement("tr");

        const cellName = document.createElement("td");
        cellName.textContent = value.name_material;
        row.appendChild(cellName);

        const cellDescription = document.createElement("td");
        cellDescription.textContent = value.description;
        row.appendChild(cellDescription);

        const cellSerialNumber = document.createElement("td");
        cellSerialNumber.textContent = value.serial_number;
        row.appendChild(cellSerialNumber);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellSize = document.createElement("td");
        cellSize.textContent = value.screen_size;
        row.appendChild(cellSize);

        const cellProcessor = document.createElement("td");
        cellProcessor.textContent = value.processor;
        row.appendChild(cellProcessor);

        const cellStorage = document.createElement("td");
        cellStorage.textContent = value.storage_memory;
        row.appendChild(cellStorage);

        const cellRam = document.createElement("td");
        cellRam.textContent = value.ram;
        row.appendChild(cellRam);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        const cellButtons = document.createElement("td");
        const ul = document.createElement("ul");
        ul.className = "flex";

        // Ajout des boutons d'édition
        const liEdit = document.createElement("li");
        const editButton = document.createElement("button");
        const editLink = document.createElement("a");
        editLink.href = `/?page=modifier-materiel&id=${value.id_material}`;
        const editImg = document.createElement("img");
        editImg.src = "assets/img/pen-writing-6.svg";
        editButton.className = "flex-button";
        editLink.appendChild(editImg);
        editLink.appendChild(document.createTextNode(" Modifier"));
        editButton.appendChild(editLink);
        liEdit.appendChild(editButton);
        ul.appendChild(liEdit);

        // Ajout des boutons de suppression
        const liDelete = document.createElement("li");
        const deleteButton = document.createElement("button");
        const deleteLink = document.createElement("a");
        deleteLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const deleteImg = document.createElement("img");
        deleteImg.src = "assets/img/trash.svg";
        deleteButton.className = "flex-button";
        deleteLink.appendChild(deleteImg);
        deleteLink.appendChild(document.createTextNode(" Supprimer"));
        deleteButton.appendChild(deleteLink);
        liDelete.appendChild(deleteButton);
        ul.appendChild(liDelete);

        // Ajout des boutons de location
        const liLoan = document.createElement("li");
        const loanButton = document.createElement("button");
        const loanLink = document.createElement("a");
        loanLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const loanImg = document.createElement("img");
        loanImg.src = "assets/img/trash.svg";
        loanButton.className = "flex-button";
        loanLink.appendChild(loanImg);
        loanLink.appendChild(document.createTextNode(" Louer"));
        loanButton.appendChild(loanLink);
        liLoan.appendChild(loanButton);
        ul.appendChild(liLoan);
        cellButtons.appendChild(ul);
        row.appendChild(cellButtons);

        tbody.appendChild(row); // Ajouter la nouvelle ligne au tableau
      });
    });

  // Mise à jour de l'en-tête du tableau
  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.className = "thead-background-available";
});

// Sélection du bouton "Matériel en panne"
let brokenMaterials = document.querySelector("#brokenMaterials");

brokenMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.broken-down")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      const tbody = document.querySelector("#myTable tbody");
      tbody.innerHTML = ""; // Supprimer toutes les lignes existantes

      // Définir les colonnes pour "Matériel en panne"
      const columns = ["Nom", "Description", "Numéro de série", "Marque", "Taille", "Processeur", "Stockage", "RAM", "Catégorie", "Actions"];
      createTableHeader(columns);

      json_resultat.forEach((value) => {
        const row = document.createElement("tr");

        const cellName = document.createElement("td");
        cellName.textContent = value.name_material;
        row.appendChild(cellName);

        const cellDescription = document.createElement("td");
        cellDescription.textContent = value.description;
        row.appendChild(cellDescription);

        const cellSerialNumber = document.createElement("td");
        cellSerialNumber.textContent = value.serial_number;
        row.appendChild(cellSerialNumber);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellSize = document.createElement("td");
        cellSize.textContent = value.screen_size;
        row.appendChild(cellSize);

        const cellProcessor = document.createElement("td");
        cellProcessor.textContent = value.processor;
        row.appendChild(cellProcessor);

        const cellStorage = document.createElement("td");
        cellStorage.textContent = value.storage_memory;
        row.appendChild(cellStorage);

        const cellRam = document.createElement("td");
        cellRam.textContent = value.ram;
        row.appendChild(cellRam);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        const cellButtons = document.createElement("td");
        const ul = document.createElement("ul");
        ul.className = "flex";

        // Ajout des boutons d'édition
        const liEdit = document.createElement("li");
        const editButton = document.createElement("button");
        const editLink = document.createElement("a");
        editLink.href = `/?page=modifier-materiel&id=${value.id_material}`;
        const editImg = document.createElement("img");
        editImg.src = "assets/img/pen-writing-6.svg";
        editButton.className = "flex-button";
        editLink.appendChild(editImg);
        editLink.appendChild(document.createTextNode(" Modifier"));
        editButton.appendChild(editLink);
        liEdit.appendChild(editButton);
        ul.appendChild(liEdit);

        // Ajout des boutons de suppression
        const liDelete = document.createElement("li");
        const deleteButton = document.createElement("button");
        const deleteLink = document.createElement("a");
        deleteLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const deleteImg = document.createElement("img");
        deleteImg.src = "assets/img/trash.svg";
        deleteButton.className = "flex-button";
        deleteLink.appendChild(deleteImg);
        deleteLink.appendChild(document.createTextNode(" Supprimer"));
        deleteButton.appendChild(deleteLink);
        liDelete.appendChild(deleteButton);
        ul.appendChild(liDelete);

        // Ajout des boutons de location
        const liLoan = document.createElement("li");
        const loanButton = document.createElement("button");
        const loanLink = document.createElement("a");
        loanLink.href = `/?page=supprimer-materiel&id=${value.id_material}`;
        const loanImg = document.createElement("img");
        loanImg.src = "assets/img/trash.svg";
        loanButton.className = "flex-button";
        loanLink.appendChild(loanImg);
        loanLink.appendChild(document.createTextNode(" Louer"));
        loanButton.appendChild(loanLink);
        liLoan.appendChild(loanButton);
        ul.appendChild(liLoan);
        cellButtons.appendChild(ul);
        row.appendChild(cellButtons);

        tbody.appendChild(row); // Ajouter la nouvelle ligne au tableau
      });
    });

  // Mise à jour de l'en-tête du tableau
  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.className = "thead-background-broken";
});
