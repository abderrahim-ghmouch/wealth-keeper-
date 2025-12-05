const incomeModal = document.getElementById("incomeModal");
const addIncome = document.getElementById("addIncomeBtn");
const closeAddBtn = document.getElementById("colsingBtn");

addIncome.addEventListener("click", () => {
    incomeModal.classList.remove("hidden");
});

closeAddBtn.addEventListener("click", () => {
    incomeModal.classList.add("hidden");
});


// ---------------------- UPDATE MODAL ----------------------
const updateForm = document.getElementById("update");
const updateButtons = document.querySelectorAll(".updBtn"); 
const closeUpdateBtns = document.querySelectorAll(".colsing");

updateButtons.forEach(btn => {
    btn.addEventListener("click", () => {
        updateForm.classList.remove("hidden");
    });
});

closeUpdateBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        updateForm.classList.add("hidden");
    });
});


// ---------------------- DELETE MODAL ----------------------
// const deleteModal = document.getElementById("deleteModal");
// const showDeleteBtns = document.querySelectorAll("#deleteButton");

// const deleteBtn = document.getElementById("deleteBtn"); // confirm delete
// const cancelDelete = document.getElementById("cancelDelete"); // cancel delete

// showDeleteBtns.forEach(btn => {
//     btn.addEventListener("click", (e) => {
//         e.preventDefault();
//         deleteModal.classList.remove("hidden");
//     });
// });

// deleteBtn.addEventListener("click", () => {
//     deleteModal.classList.add("hidden");
// });

// cancelDelete.addEventListener("click", (e) => {
//     e.preventDefault();
//     deleteModal.classList.add("hidden");
// });