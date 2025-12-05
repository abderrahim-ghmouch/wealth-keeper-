const incomeModal = document.getElementById("incomeModal");
const addIncome = document.getElementById("addIncomeBtn");
const closeAddBtn = document.getElementById("colsingBtn");

addIncome.addEventListener("click", () => {
    incomeModal.classList.remove("hidden");
});

closeAddBtn.addEventListener("click", () => {
    incomeModal.classList.add("hidden");
});



const updateButtons = document.querySelectorAll(".updBtn");
const updateModal = document.getElementById("updateModal");
const cancelUpdate = document.getElementById("closeUpdate");

updateButtons.forEach(button => {
    button.addEventListener("click", (e) => {
        e.preventDefault();
        updateModal.classList.remove("hidden");
    });
});


cancelUpdate.addEventListener("click", () => {
    updateModal.classList.add("hidden");
});
