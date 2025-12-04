const incomeModal = document.getElementById("incomeModal");
const addIncome = document.getElementById("addIncomeBtn");
const colseBtn=document.getElementById("colsingBtn")
addIncome.addEventListener("click", () => {
    incomeModal.classList.remove("hidden");
});

colseBtn.addEventListener("click",()=>{
    incomeModal.classList.add("hidden")
})


updateForm=document.getElementById("update")
updateBtn=document.getElementById("updBtn")
colseUpt=document.getElementById("colsingUpd")

updateBtn.addEventListener("click",(e)=>{

    updateForm.classList.remove("hidden")
})
colseUpt.addEventListener("click",()=>{
     updateForm.classList.add("hidden")
})

