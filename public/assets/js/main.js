let allMaterials = document.querySelector("#allMaterials");

// TAB
allMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.all-material")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      // Sélectionne toutes les cellules <td> du tableau
      const tbody = document.querySelector("#myTable tbody");

      // Supprime chaque cellule <td>
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }

      // Créer un nouveau tableau
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

        const cellDatePurchase = document.createElement("td");
        cellDatePurchase.textContent = value.date_purchase;
        row.appendChild(cellDatePurchase);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        // Ajouter les nouvelles lignes au tableau
        tbody.appendChild(row);
      });
    });
    const tableHeader = document.querySelector("#myTable thead");
    tableHeader.classList.remove(
      "thead-background-loan",
      "thead-background-available",
      "thead-background-broken");
  
    tableHeader.classList.add("thead-background");
});

let loanMaterials = document.querySelector("#loanMaterials");

// TABLEAU MATERIEL EMPRUNTÉ
loanMaterials.addEventListener("click", function () {
 

  fetch("ajax.php?ajax=json.loan")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      // Sélectionne toutes les cellules <td> du tableau
      const tbody = document.querySelector("#myTable tbody");

      // Supprime chaque cellule <td>
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }
      // Créer un nouveau tableau
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

        const cellDatePurchase = document.createElement("td");
        cellDatePurchase.textContent = value.date_purchase;
        row.appendChild(cellDatePurchase);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        // Ajouter les nouvelles lignes au tableau
        tbody.appendChild(row);
      });
    });
 
    const tableHeader = document.querySelector("#myTable thead");
    tableHeader.classList.remove(
      "thead-background",
      "thead-background-available",
      "thead-background-broken");
  
    tableHeader.classList.add("thead-background-loan");
  });

// TABLEAU MATERIEL DISPONIBLE
let availableMaterials = document.querySelector("#availableMaterials");

availableMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.available-material")
  
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      // Sélectionne toutes les cellules <td> du tableau
      const tbody = document.querySelector("#myTable tbody");

      // Supprime chaque cellule <td>
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }
      // Créer un nouveau tableau
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

        const cellDatePurchase = document.createElement("td");
        cellDatePurchase.textContent = value.date_purchase;
        row.appendChild(cellDatePurchase);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        // Ajouter les nouvelles lignes au tableau
        tbody.appendChild(row);
      });
    });
    const tableHeader = document.querySelector("#myTable thead");
    tableHeader.classList.remove(
      "thead-background-loan",
      "thead-background",
      "thead-background-broken");
  
    tableHeader.classList.add("thead-background-available");
});

// TABLEAU MATERIEL EN PANNE

let brokenMaterials = document.querySelector("#brokenMaterials");
brokenMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.broken-down")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      // Sélectionne toutes les cellules <td> du tableau
      const tbody = document.querySelector("#myTable tbody");

      // Supprime chaque cellule <td>
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }
      // Créer un nouveau tableau
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

        const cellDatePurchase = document.createElement("td");
        cellDatePurchase.textContent = value.date_purchase;
        row.appendChild(cellDatePurchase);

        const cellBrand = document.createElement("td");
        cellBrand.textContent = value.name_brand;
        row.appendChild(cellBrand);

        const cellCategory = document.createElement("td");
        cellCategory.textContent = value.name_category;
        row.appendChild(cellCategory);

        // Ajouter les nouvelles lignes au tableau
        tbody.appendChild(row);
      });
    });
    
    const tableHeader = document.querySelector("#myTable thead");
    tableHeader.classList.remove(
      "thead-background-loan",
      "thead-background-available",
      "thead-background");
  
    tableHeader.classList.add("thead-background-broken");
});


// Chart JS

const data = {
  labels: [
    'En location',
    'Disponible',
    'En panne'
  ],
  datasets: [{
    label: 'Nombre d\équipement',
    data: [300, 100, 50],
    backgroundColor: [
      '#FFB566',
      '#E6E9E0',
      '#776E9A'
    ],
    hoverOffset: 4
  }]
};

const config = {
  type: 'doughnut',
  data: data,
};

// Initialiser le graphique
document.addEventListener('DOMContentLoaded', function() {
  let ctx = document.querySelector("#myChart").getContext('2d');
  new Chart(ctx, config);
});

const dataUser = {
  labels: [
    'En location',
    'Disponible',
    'En panne'
  ],
  datasets: [{
    label: 'Nombre d\équipement',
    data: [300, 100, 50],
    backgroundColor: [
      '#FFB566',
      '#E6E9E0',
      '#776E9A'
    ],
    hoverOffset: 4
  }]
};

const configUser = {
  type: 'doughnut',
  data: data,
};

// Initialiser le graphique
document.addEventListener('DOMContentLoaded', function() {
  let ctx = document.querySelector("#myChartuser").getContext('2d');
  new Chart(ctx, configUser);
});