(function() {
  document.getElementById("loginBtn").addEventListener('click', login);
  $("#error").css("display", "none");


function login() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password");
  const hashPass = CryptoJS.MD5(password.value).toString();

  $.ajax({
      type:"POST",
      url: 'http://localhost/login.php',
      data: {username, password: hashPass},
      complete: function(data) {
        if(data.responseText === "Success") {
          location.href = "butoane.html";
        } else {
          $("#error").text(data.responseText);
          $("#error").css("display", "block");
        }

      }
  });

}
})()
