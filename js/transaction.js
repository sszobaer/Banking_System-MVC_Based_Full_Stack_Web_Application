let filterId = [
    "filter-date",
    "filter-amount",
    "filter-type",
    "search-reference",
  ];
let downloadBtn = document.getElementById("download-pdf");
function filterTransactions() {
  const date = document.getElementById("filter-date").value;
  const amount = document.getElementById("filter-amount").value;
  const type = document.getElementById("filter-type").value.toLowerCase();
  const keyword = document
    .getElementById("search-reference")
    .value.toLowerCase();

  document.querySelectorAll(".transactions-table tbody tr").forEach((row) => {
    const cells = row.querySelectorAll("td");
    const rowDate = cells[0].textContent;
    const description = cells[1].textContent.toLowerCase();
    const rowAmount = cells[2].textContent;

    if (
      (!date || rowDate.includes(date)) &&
      (!amount || rowAmount.includes(amount)) &&
      (!type || description.includes(type)) &&
      (!keyword || description.includes(keyword))
    ) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}

function downloadPDF() {
  const doc = new window.jspdf.jsPDF();
  doc.text("Recent Transactions", 10, 10);

  const rows = Array.from(
    document.querySelectorAll(".transactions-table tbody tr")
  )
    .filter((row) => row.style.display !== "none")
    .map((row) =>
      Array.from(row.querySelectorAll("td")).map((td) => td.textContent.trim())
    );

  const validRows = rows.filter((row) => row.some((cell) => cell !== ""));
  if (validRows.length === 0) {
    alert("No transactions to download.");
    return;
  } else {
    doc.autoTable({
      head: [["Date", "Description", "Amount", "Status"]],
      body: rows,
      startY: 20,
      headStyles: {
        fillColor: [255, 165, 0],
        textColor: [255, 255, 255],
        fontStyle: "bold",
      },
    });

    doc.save("transactions.pdf");
  }
}

filterId.forEach((id) => {
  document.getElementById(id).addEventListener("input", filterTransactions);
});

downloadBtn.addEventListener("click", downloadPDF);
