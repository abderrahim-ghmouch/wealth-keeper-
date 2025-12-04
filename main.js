const incomeModal = document.getElementById("incomeModal");
const addIncome = document.getElementById("addIncomeBtn");
const colseBtn=document.getElementById("colseingBtn")
addIncome.addEventListener("click", () => {
    incomeModal.classList.remove("hidden");
});

colseBtn.addEventListener("click",()=>{
    incomeModal.classList.add("hidden")
})
