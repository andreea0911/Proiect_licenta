(function() {
  function usePage(frm, ev) {
      // get radio button being checked
      const selectedClientType = document.querySelector('input[name="client-type"]:checked');

      location.href = selectedClientType.value


  }

  document.getElementById("submit-btn").addEventListener('click', usePage);

})()
