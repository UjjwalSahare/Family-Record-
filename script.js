document.getElementById("submit").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    // Collect the form data
    const formData = {
        fatherName: document.getElementById("fName").value,
        motherName: document.getElementById("MName").value,
        placeOfBirth: document.getElementById("pob").value,
        dob: document.getElementById("dob").value,
        childName: document.getElementById("childname").value
    };

    // Validate the form data
    const validateForm = function(formData) {
        // Check if all required fields are filled
        if (formData.fatherName && formData.motherName && formData.placeOfBirth && formData.childName) {
            // If all data is valid, send it to the server
            sendFormDataToServer(formData);
            return true;
        } else {
            // If any data is invalid, show an error message
            alert("Please enter all details in the form.");
            return false;
        }
    };

    // Call the validateForm function
    validateForm(formData);
});
