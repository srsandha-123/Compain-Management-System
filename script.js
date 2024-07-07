document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    var ipasId = document.getElementById("ipas").value;
    var password = document.getElementById("password").value;

    // Perform validation or authentication logic here
    if (ipasId === "admin" && password === "password") {
        // Successful login
        alert("Login successful!");
    } else {
        // Wrong input
        alert("Wrong IPAS ID or password!");
    }
});
