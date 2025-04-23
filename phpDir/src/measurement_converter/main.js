// Function to update the conversion options based on selected type
function updateConversionOptions() {
  const conversionType = document.getElementById("conversion_type").value;

  // Hide all option groups
  document.querySelectorAll(".option-group").forEach((group) => {
    group.style.display = "none";
  });

  // Show selected option group
  document.getElementById(conversionType + "-options").style.display = "block";
}

// Initialize the page
window.onload = function () {
  updateConversionOptions();

  // Add submit event listener to form
  document.querySelector("form").addEventListener("submit", function (e) {
    e.preventDefault(); // Prevent the default form submission

    // Get form data
    const formData = new FormData(this);

    // Send form data via fetch API
    fetch("convert.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Network response was not ok " + response.statusText);
        }
        return response.json();
      })
      .then((data) => {
        // Display the result
        const resultDiv = document.getElementById("result");
        resultDiv.innerHTML = `
                <h2>Conversion Result</h2>
                <p>${data.from_value} ${data.from_unit} = ${data.result} ${data.to_unit}</p>
            `;

        // Scroll to results
        resultDiv.scrollIntoView({ behavior: "smooth" });
      })
      .catch((error) => {
        console.error("Error:", error);
        // Display error message
        document.getElementById("result").innerHTML = `
                <h2>Error</h2>
                <p>There was a problem with the conversion. Please try again.</p>
            `;
      });
  });
};
