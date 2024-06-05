let roleAdmin = document.querySelector("#roleAdmin");
let roleIntervenant = document.querySelector("#roleIntervenant");
let roleStagiaire = document.querySelector("#roleStagiaire");
let paginationContainer = document.querySelector("#pagination .pagination");

roleAdmin.addEventListener("click", function () {
  fetchUsers(1, 1); // Filtre pour les administrateurs (ID de rôle 1)
  changeThBackgroundColor("var(--orange)");
});

roleIntervenant.addEventListener("click", function () {
  fetchUsers(1, 3); // Filtre pour les intervenants (ID de rôle 3)
  changeThBackgroundColor("var(--purple)");
});

roleStagiaire.addEventListener("click", function () {
  fetchUsers(1, 2); // Filtre pour les stagiaires (ID de rôle 2)
  changeThBackgroundColor("var(--grey)");
  setThTextColor("var(--black)");
});

function setThTextColor(color) {
  const thElements = document.querySelectorAll("#tableUsers th");
  thElements.forEach((th) => {
    th.style.color = color;
  });
}

function changeThBackgroundColor(color) {
  const thElements = document.querySelectorAll("#tableUsers th");
  thElements.forEach((th) => {
    th.style.backgroundColor = color;
  });
}

function setupPagination(pagination, role = null) {
  paginationContainer.innerHTML = "";

  const firstPageItem = document.createElement("li");
  firstPageItem.className = "page-item first-page";
  const firstPageLink = document.createElement("a");
  firstPageLink.className = "page-link";
  firstPageLink.href = "#";
  firstPageLink.setAttribute("aria-label", "First");
  firstPageLink.innerHTML = "<span aria-hidden='true'>&laquo;</span>";
  firstPageLink.addEventListener("click", function (event) {
    event.preventDefault();
    fetchUsers(1, role);
  });
  firstPageItem.appendChild(firstPageLink);
  paginationContainer.appendChild(firstPageItem);

  const prevPageItem = document.createElement("li");
  prevPageItem.className = "page-item previous-page";
  const prevPageLink = document.createElement("a");
  prevPageLink.className = "page-link";
  prevPageLink.href = "#";
  prevPageLink.setAttribute("aria-label", "Previous");
  prevPageLink.innerHTML = "<span aria-hidden='true'>&lt;</span>";
  prevPageLink.addEventListener("click", function (event) {
    event.preventDefault();
    fetchUsers(Math.max(1, pagination.currentPage - 1), role);
  });
  prevPageItem.appendChild(prevPageLink);
  paginationContainer.appendChild(prevPageItem);

  for (let i = 1; i <= pagination.nbPages; i++) {
    const pageItem = document.createElement("li");
    pageItem.className = `page-item ${
      i === pagination.currentPage ? "active" : ""
    }`;
    const pageLink = document.createElement("a");
    pageLink.className = "page-link";
    pageLink.href = "#";
    pageLink.textContent = i;
    pageLink.addEventListener("click", function (event) {
      event.preventDefault();
      fetchUsers(i, role);
    });
    pageItem.appendChild(pageLink);
    paginationContainer.appendChild(pageItem);
  }

  const nextPageItem = document.createElement("li");
  nextPageItem.className = "page-item next-page";
  const nextPageLink = document.createElement("a");
  nextPageLink.className = "page-link";
  nextPageLink.href = "#";
  nextPageLink.setAttribute("aria-label", "Next");
  nextPageLink.innerHTML = "<span aria-hidden='true'>&gt;</span>";
  nextPageLink.addEventListener("click", function (event) {
    event.preventDefault();
    fetchUsers(Math.min(pagination.nbPages, pagination.currentPage + 1), role);
  });
  nextPageItem.appendChild(nextPageLink);
  paginationContainer.appendChild(nextPageItem);

  const lastPageItem = document.createElement("li");
  lastPageItem.className = "page-item last-page";
  const lastPageLink = document.createElement("a");
  lastPageLink.className = "page-link";
  lastPageLink.href = "#";
  lastPageLink.setAttribute("aria-label", "Last");
  lastPageLink.innerHTML = "<span aria-hidden='true'>&raquo;</span>";
  lastPageLink.addEventListener("click", function (event) {
    event.preventDefault();
    fetchUsers(pagination.nbPages, role);
  });
  lastPageItem.appendChild(lastPageLink);
  paginationContainer.appendChild(lastPageItem);
}

function fetchUsers(page, role = null) {
  let url = `ajax.php?ajax=json.all-users&pagination=${page}`;
  if (role !== null) {
    url += `&role=${role}`;
  }

  fetch(url)
    .then((response) => response.json())
    .then((json_result) => {
      if (json_result.error) {
        console.error(json_result.error);
        return;
      }

      const tbody = document.querySelector("#tableUsers tbody");
      tbody.innerHTML = "";

      json_result.users.forEach((user) => {
        const row = document.createElement("tr");

        const cellLastName = document.createElement("td");
        cellLastName.textContent = user.lastname;
        row.appendChild(cellLastName);

        const cellFirstName = document.createElement("td");
        cellFirstName.textContent = user.firstname;
        row.appendChild(cellFirstName);

        const cellEmail = document.createElement("td");
        cellEmail.textContent = user.email;
        row.appendChild(cellEmail);

        const cellRole = document.createElement("td");
        cellRole.textContent = user.name_role;
        row.appendChild(cellRole);

        const cellButtons = document.createElement("td");

        const ul = document.createElement("ul");

        const liEdit = document.createElement("li");
        const editButton = document.createElement("button");
        const editLink = document.createElement("a");
        editLink.href = `/?page=modifier-utilisateur&id=${user.id_users}`;
        const editImg = document.createElement("img");
        editImg.src = "assets/img/pen-writing-6.svg";
        editImg.className = "button-crud-users";
        editLink.appendChild(editImg);
        editLink.appendChild(document.createTextNode(" Modifier"));
        editButton.appendChild(editLink);
        liEdit.appendChild(editButton);
        ul.appendChild(liEdit);

        const liDelete = document.createElement("li");
        const deleteButton = document.createElement("button");
        const deleteLink = document.createElement("a");
        deleteLink.href = `/?page=supprimer-utilisateur&id=${user.id_users}`;
        const deleteImg = document.createElement("img");
        deleteImg.src = "assets/img/trash.svg";
        deleteImg.className = "button-crud-users";
        deleteLink.appendChild(deleteImg);
        deleteLink.appendChild(document.createTextNode(" Supprimer"));
        deleteButton.appendChild(deleteLink);
        liDelete.appendChild(deleteButton);
        ul.appendChild(liDelete);

        cellButtons.appendChild(ul);
        row.appendChild(cellButtons);

        tbody.appendChild(row);
      });

      setupPagination(json_result.pagination, role);
    })
    .catch((error) => console.error("Erreur:", error));
}
