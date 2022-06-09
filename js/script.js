(function() {
  function usePage(frm, ev) {
      // radio button
      const selectedClientType = document.querySelector('input[name="client-type"]:checked');

      location.href = selectedClientType.value



  }
  if (document.getElementById("submit-btn")) document.getElementById("submit-btn").addEventListener('click', usePage);


//total
  function addEventListener() {
    const checkItems = Array.from(document.getElementsByClassName("form-check-input"));
    checkItems.forEach(item => {

      item.addEventListener('click', function handleClick(event) {
        calculateTotal(checkItems);
      });
    });
  }
  function getServices() {
    $.ajax({
        type:"GET",
        url: 'http://localhost/total.php',
        complete: function(data) {
          const dataParsed = JSON.parse(data.responseText)
          buildHtml(dataParsed);
          addEventListener();

        }
    });
  }
  function buildHtml(array) {
    let html = "";
    array.forEach(el => {
      html += "<li class='list-group-item'><input id='" + el.pret + "' class='form-check-input me-1' type='checkbox' value=''>" + el.nume + "</li>";
    })
    $("#listWrapper").html(html);
  }

  function calculateTotal(checkItems) {

    const prices = checkItems.filter(item => item.checked).map(item => +item.id)
    let sum = 0;
    prices.forEach(item => sum += item);
    $("#totalWrapper").text(sum);
  }

  function getProgramari() {
    $.ajax({
        type:"POST",
        url: 'http://localhost/programari.php',
        data: {entity: "get-programare"},
        complete: function(data) {
          const dataParsed = JSON.parse(data.responseText)
          buildProgramariTable(dataParsed)
        }
    });
  }

  function buildProgramariTable(data) {
    const programariWrapper = document.getElementById("programariContainer");
    let htmlString = `<table class='table-bordered'><thead>
    <th>Nume</th><th>Prenume</th><th>Model Masina</th><th>Numar masina</th><th>Data intrare</th>
    </thead><tbody>`;

    data.forEach((item, i) => {
      htmlString += "<tr><td>" + item.nume + "</td>";
      htmlString += `<td>${item.prenume}</td>`;
      htmlString += "<td>" + item.model + "</td>";
      htmlString += "<td>" + item.nr_masina + "</td>";
      htmlString += "<td>" + item.data_intrare + "</td></tr>";

    });
    htmlString += "</tbody></table>";
    console.log(htmlString)
    programariWrapper.innerHTML = htmlString;
  }
  getProgramari();
  getServices();
})()
