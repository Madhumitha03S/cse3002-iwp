function validateForm() {
    var firstName = document.forms["registrationForm"]["firstName"].value;
    var lastName = document.forms["registrationForm"]["lastName"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var phone = document.forms["registrationForm"]["phone"].value;
    var dateOfBirth =
      document.forms["registrationForm"]["dateOfBirth"].value;
    var address = document.forms["registrationForm"]["address"].value;
    var city = document.forms["registrationForm"]["city"].value;
    var state = document.forms["registrationForm"]["state"].value;
    var zip = document.forms["registrationForm"]["zip"].value;
    var policyNumber =
      document.forms["registrationForm"]["policyNumber"].value;

    var nameRegex = /^[a-zA-Z]+$/;
    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var phoneRegex = /^\d{10}$/;
    var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
    var zipRegex = /^\d{5}$/;
    var policyRegex = /^[A-Za-z]{2}\d{6}$/;

    if (
      firstName == "" ||
      lastName == "" ||
      email == "" ||
      phone == "" ||
      dateOfBirth == "" ||
      address == "" ||
      city == "" ||
      state == "" ||
      zip == "" ||
      policyNumber == ""
    ) {
      alert("All fields are required!");
      return false;
    }

    if (
      !firstName.match(nameRegex) ||
      !lastName.match(nameRegex) ||
      !email.match(emailRegex) ||
      !phone.match(phoneRegex) ||
      !dateOfBirth.match(dateRegex) ||
      !zip.match(zipRegex) ||
      !policyNumber.match(policyRegex)
    ) {
      alert("Invalid format in one or more fields!");
      return false;
    }

    return true;
  }
