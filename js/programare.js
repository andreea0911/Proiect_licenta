(function() {
  document.getElementById("add_programare").addEventListener('click', add);

  const addEventListeners = () => {
    const btnsProgramare = Array.from(document.getElementsByClassName("programare"));

    btnsProgramare.forEach(btnProgramare => {

      btnProgramare.addEventListener('click', function handleClick(event) {

        adaugaProgramare(event.target.getAttribute("id"));
      });
    });
  }
  addEventListeners();

  function add() {
    const nume = document.getElementById("nume").value;
    const model = document.getElementById("model").value;
    const id_client = document.getElementById("id_client").value;
    const id_masina = document.getElementById("id_masina").value;
    const data_intrare = document.getElementById("data_intrare");
    $.ajax({
        type:"POST",
        url: 'http://localhost/programari.php',
        data: {nume, model, id_client, id_masina, data_intrare: data_intrare.value, entity: "add-programare"},
        complete: function(data) {
          data_intrare.value = "";
          location.href = "http://localhost/butoane.html"
        }
      });
    }

  function adaugaProgramare(data) {
    const splitData = data.split("_")
    const clientId = splitData[0];
    const masinaId = splitData[1];
    const nume = splitData[2];

    const formWrapper = document.getElementById("programare-form");
    const numeWrapper = document.getElementById("nume");
    const modelWraper = document.getElementById("model");
    const idClientWrapper = document.getElementById("id_client");
    const idMasinaWrapper = document.getElementById("id_masina");


    formWrapper.style.display = "block";
    numeWrapper.textContent = masinaId;

    idClientWrapper.value = clientId
    idMasinaWrapper.value = masinaId


  }
})()
