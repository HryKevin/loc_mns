let tableMaterials = document.querySelector("#tableMaterials");
let allMaterials = document.querySelector("#allMaterials");
// let loan = document.querySelector("#produit");

allMaterials.addEventListener("click", function () {
  fetch("ajax.php?ajax=json.all-material")
    .then((resultat) => resultat.json())
    .then(async (json_resultat) => {
      // Récupérer le modèle de tableau client depuis le HTML
      let template = document.querySelector("#materialsIndex");

      // Remplir le tableau avec les données
      for (const valeur of json_resultat) {
        // Cloner le modèle de tableau
        let cloneTemplate = template.content.cloneNode(true);

        // Remplacer les marqueurs de données par les valeurs réelles
        let ligne = cloneTemplate.firstElementChild;

        ligne.innerHTML = ligne.innerHTML.replace(
          "{{name_material}}",
          valeur.name_material
        );
        ligne.innerHTML = ligne.innerHTML.replace(
          "{{description}}",
          valeur.description
        );
        ligne.innerHTML = ligne.innerHTML.replace(
          "{{serial_number}}",
          valeur.serial_number
        );
        ligne.innerHTML = ligne.innerHTML.replace(
          "{{date_purchase}}",
          valeur.date_purchase
        );
        ligne.innerHTML = ligne.innerHTML.replace(
          "{{name_brand}}",
          valeur.name_brand
        );
        ligne.innerHTML = ligne.innerHTML.replace(
          "{{name_category}}",
          valeur.name_category
        );

        // Ajouter la ligne clonée au nouveau tableau
        newTable.appendChild(cloneTemplate);
      }

      // Supprimer les anciens tableaux s'il y en a
      while (tableMaterials.firstChild) {
        tableMaterials.removeChild(tableMaterials.firstChild);
      }

      // Ajouter le nouveau tableau à l'élément principal
      tableMaterials.appendChild(newTable);
    });
});

// produit.addEventListener("click", function () {
//   fetch("http://coursjs.local/2024_01_03/json.article.php")
//     .then((resultat) => resultat.json())
//     .then(async (json_resultat) => {
//       // Créer un nouveau tableau
//       let newTable = document.createElement("table");
//       newTable.classList.add("produit-table");

//       // Créer le thead et les en-têtes de colonne
//       let thead = document.createElement("thead");
//       let headerRow = document.createElement("tr");
//       headerRow.innerHTML = `
//           <th>Id</th>
//           <th>description</th>
//           <th>quantité</th>
//           <th>price</th>
//         `;
//       thead.appendChild(headerRow);

//       // Ajouter le thead au tableau
//       newTable.appendChild(thead);

//       // Récupérer le modèle de tableau produit depuis le HTML
//       let template = document.querySelector("#tableProduit");

//       // Remplir le tableau avec les données
//       for (const valeur of json_resultat) {
//         // Cloner le modèle de tableau
//         let cloneTemplate = template.content.cloneNode(true);

//         let ligne = cloneTemplate.firstElementChild;

//         ligne.innerHTML = ligne.innerHTML.replace(
//           "{{numarticle}}",
//           valeur.num_article
//         );
//         ligne.innerHTML = ligne.innerHTML.replace(
//           "{{description}}",
//           valeur.description_article
//         );
//         ligne.innerHTML = ligne.innerHTML.replace(
//           "{{quantite}}",
//           valeur.quantite_stock
//         );
//         ligne.innerHTML = ligne.innerHTML.replace("{{price}}", valeur.prix_ht);
//         // Ajouter la ligne clonée au nouveau tableau
//         newTable.appendChild(cloneTemplate);
//       }

//       // Supprimer les anciens tableaux s'il y en a
//       while (mainElement.firstChild) {
//         mainElement.removeChild(mainElement.firstChild);
//       }

//       // Ajouter le nouveau tableau à l'élément principal
//       mainElement.appendChild(newTable);
//     });
// });
