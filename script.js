window.addEventListener("DOMContentLoaded", function () {
  this.document
    .getElementById("tableSelect")
    .addEventListener("change", function () {
      var table = this.value;
      window.location.href = "?tabela=" + encodeURIComponent(table);
    });

  this.document.getElementById("item").addEventListener("click", function () {
    console.log("Item clicado.");
  });

  const dataResultsDiv = this.document.querySelector(".data-results");
  let selectedRow = null;

  function toggleRowHighlight(event) {
    const clickedRow = event.target.closest("tr");

    if (!clickedRow || !dataResultsDiv.contains(clickedRow)) {
      return;
    }

    if (selectedRow && selectedRow !== clickedRow) {
      selectedRow.classList.remove("highlighted-row");
    }

    clickedRow.classList.toggle("highlighted-row");

    selectedRow = clickedRow.classList.contains("highlighted-row")
      ? clickedRow
      : null;
  }

  if (dataResultsDiv) {
    dataResultsDiv.addEventListener("click", toggleRowHighlight);
  }

  const tableSelect = this.document.getElementById("tableSelect");
  if (tableSelect) {
    tableSelect.addEventListener("change", () => {
      if (selectedRow) {
        selectedRow.classList.remove("highlighted-row");
        selectedRow = null;
      }
    });
  }
});
