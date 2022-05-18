(function() {

setTimeout(() => {
  const addEventListeners = () => {
    const btnsProgramare = Array.from(document.getElementsByClassName("programare"));

    btnsProgramare.forEach(btnProgramare => {

      btnProgramare.addEventListener('click', function handleClick(event) {

        adaugaProgramare(event.target.getAttribute("id"));
      });
    });
  }
  addEventListeners();


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


}, 500)

})()
