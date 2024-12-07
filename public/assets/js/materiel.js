// Fonction pour créer l'en-tête du tableau avec des colonnes spécifiées
function createTableHeader(columns) {
  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.innerHTML = ""; // Effacer le contenu existant de l'en-tête
  const headerRow = document.createElement("tr");

  columns.forEach((column) => {
    const th = document.createElement("th");
    th.textContent = column;
    headerRow.appendChild(th);
  });

  tableHeader.appendChild(headerRow);
}

// Fonction pour ajouter les boutons d'action au tableau
function addActionButtons(value, ul, isAvailableFilter = false) {
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

  // Ajout du bouton Louer uniquement si le filtre "Matériel disponible" est activé ou si le matériel est disponible
  if (isAvailableFilter || value.availability_status === "Disponible") {
    const liLoan = document.createElement("li");
    const loanButton = document.createElement("button");
    const loanLink = document.createElement("a");
    loanLink.href = `/?page=louer-materiel&id=${value.id_material}`;
    const loanImg = document.createElement("img");
    loanImg.src = "assets/img/basket.png";
    loanButton.className = "flex-button";
    loanLink.appendChild(loanImg);
    loanLink.appendChild(document.createTextNode(" Louer"));
    loanButton.appendChild(loanLink);
    liLoan.appendChild(loanButton);
    ul.appendChild(liLoan);
  }
}

// Fonction pour peupler le tableau avec les données reçues
function populateTable(json_resultat, includeLoanDates = false, isAvailableFilter = false) {
  const tbody = document.querySelector("#myTable tbody");
  tbody.innerHTML = ""; // Supprimer toutes les lignes existantes

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

    if (includeLoanDates) {
      const cellDateLoan = document.createElement("td");
      cellDateLoan.textContent = value.date_loan || "N/A";
      row.appendChild(cellDateLoan);

      const cellDateReturn = document.createElement("td");
      cellDateReturn.textContent = value.date_return || "N/A";
      row.appendChild(cellDateReturn);
    }

    const cellButtons = document.createElement("td");
    const ul = document.createElement("ul");
    ul.className = "flex";

    // Appel de addActionButtons avec isAvailableFilter pour contrôler le bouton Louer
    addActionButtons(value, ul, isAvailableFilter);

    cellButtons.appendChild(ul);
    row.appendChild(cellButtons);

    tbody.appendChild(row); // Ajouter la nouvelle ligne au tableau
  });
}

// Fonction pour gérer l'affichage selon les boutons
function handleMaterialDisplay(endpoint, headerClass, columns, includeLoanDates = false, isAvailableFilter = false) {
  fetch(endpoint)
    .then((resultat) => resultat.json())
    .then((json_resultat) => {
      createTableHeader(columns);
      populateTable(json_resultat, includeLoanDates, isAvailableFilter);
    });

  const tableHeader = document.querySelector("#myTable thead");
  tableHeader.className = headerClass;
}

// Sélection du bouton "Tout le matériel"
let allMaterials = document.querySelector("#allMaterials");
allMaterials.addEventListener("click", function () {
  handleMaterialDisplay("ajax.php?ajax=json.all-material", "thead-background", [
    "Nom",
    "Description",
    "Numéro de série",
    "Marque",
    "Taille",
    "Processeur",
    "Stockage",
    "RAM",
    "Catégorie",
    "Actions",
  ]);
});

// Sélection du bouton "Matériel emprunté"
let loanMaterials = document.querySelector("#loanMaterials");
loanMaterials.addEventListener("click", function () {
  handleMaterialDisplay(
    "ajax.php?ajax=json.loan",
    "thead-background-loan",
    [
      "Nom",
      "Description",
      "Numéro de série",
      "Marque",
      "Taille",
      "Processeur",
      "Stockage",
      "RAM",
      "Catégorie",
      "Date de début de location",
      "Date de fin de location",
      "Actions",
    ],
    true // Inclure les dates de prêt pour le matériel emprunté
  );
});

// Sélection du bouton "Matériel disponible"
let availableMaterials = document.querySelector("#availableMaterials");
availableMaterials.addEventListener("click", function () {
  handleMaterialDisplay(
    "ajax.php?ajax=json.available-material",
    "thead-background-available",
    [
      "Nom",
      "Description",
      "Numéro de série",
      "Marque",
      "Taille",
      "Processeur",
      "Stockage",
      "RAM",
      "Catégorie",
      "Actions",
    ],
    false, // Pas besoin d'inclure les dates de prêt
    true // Indiquer qu'on utilise le filtre des matériaux disponibles
  );
});

// Sélection du bouton "Matériel en panne"
let brokenMaterials = document.querySelector("#brokenMaterials");
brokenMaterials.addEventListener("click", function () {
  handleMaterialDisplay(
    "ajax.php?ajax=json.broken-down",
    "thead-background-broken",
    [
      "Nom",
      "Description",
      "Numéro de série",
      "Marque",
      "Taille",
      "Processeur",
      "Stockage",
      "RAM",
      "Catégorie",
      "Actions",
    ]
  );
});
