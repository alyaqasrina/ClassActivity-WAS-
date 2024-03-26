function validateForm() {
    // Retrieve input data from form
    var name = document.getElementById('name').value.trim();
    var matricNo = document.getElementById('matricNo').value.trim();
    var currAdd = document.getElementById('currAdd').value.trim();
    var homeAdd = document.getElementById('homeAdd').value.trim();
    var email = document.getElementById('email').value.trim();
    var mobile = document.getElementById('mobile').value.trim();
    var home = document.getElementById('home').value.trim();

    // Regular expression patterns
    var namePattern = /^[a-zA-Z\s]+$/; // Only letters and spaces allowed
    var matricPattern = /^\d{7}$/; // 8 digits allowed
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Valid email format
    var phonePattern = /^\d{10}$/; // 10 digits allowed
    var addressPattern =  /^[A-Za-z0-9\s,.]+(?:\d{5})?.*/; // Only letters, numbers, spaces, commas, and periods allowed



    // Validate each field
    if (!namePattern.test(name)) {
        showError("Error: Full Name must contain only letters and spaces.");
        return false;
    }
    if (!matricPattern.test(matricNo)) {
        showError("Error: Matric No must be 8 digits long.");
        return false;
    }
    if (!addressPattern.test(currAdd)) {
        showError("Error: Current Address must contain only letters and spaces.");
        return false;
    }
    if (!addressPattern.test(homeAdd)) {
        showError("Error: Home Address must contain only letters and spaces.");
        return false;
    }
    if (!emailPattern.test(email)) {
        showError("Error: Invalid email address.");
        return false;
    }
    if (!phonePattern.test(mobile)) {
        showError("Error: Mobile phone number must be 10 digits long.");
        return false;
    }
    if (!phonePattern.test(home)) {
        showError("Error: Home phone number must be 10 digits long.");
        return false;
    }

    // All fields are valid
    return true;
}

function showError(message) {
    var errorMsg = document.getElementById('error-msg');
    errorMsg.textContent = message;
}

