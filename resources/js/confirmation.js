document.addEventListener("DOMContentLoaded", () => {
    // Create the modal overlay element
    const modalOverlay = document.createElement("div");
    modalOverlay.id = "custom-modal-overlay";
    Object.assign(modalOverlay.style, {
        position: "fixed",
        top: "0",
        left: "0",
        width: "100%",
        height: "100%",
        background: "rgba(0, 0, 0, 0.5)",
        display: "none",
        alignItems: "center",
        justifyContent: "center",
        zIndex: "1000"
    });

    // Create the modal container
    const modal = document.createElement("div");
    modal.id = "custom-modal";
    Object.assign(modal.style, {
        background: "#fff",
        borderRadius: "8px",
        width: "300px",
        maxWidth: "90%",
        padding: "20px",
        textAlign: "center",
        boxShadow: "0 5px 15px rgba(0, 0, 0, 0.3)"
    });

    // Add content to the modal
    modal.innerHTML = `
      <p style="margin-bottom: 20px;">Are you sure you want to proceed?</p>
      <button id="confirm-btn" style="
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: #4caf50;
        color: #fff;
      ">Yes, proceed!</button>
      <button id="cancel-btn" style="
        margin: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        background-color: #f44336;
        color: #fff;
      ">Cancel</button>
    `;

    // Append modal to the overlay and overlay to the body
    modalOverlay.appendChild(modal);
    document.body.appendChild(modalOverlay);

    const form = document.getElementById("myForm");

    const showModal = () => {
        modalOverlay.style.display = "flex";
    };

    const hideModal = () => {
        modalOverlay.style.display = "none";
    };

    form.addEventListener("submit", (event) => {
        // Prevent the form from submitting immediately
        event.preventDefault();
        showModal();

        // Attach click events with the 'once' option so they fire only one time
        document.getElementById("confirm-btn").addEventListener("click", () => {
            hideModal();
            form.submit(); // Submit the form after confirmation
        }, { once: true });

        document.getElementById("cancel-btn").addEventListener("click", () => {
            hideModal();
        }, { once: true });
    });
});
