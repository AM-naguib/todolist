let pushWindow = document.querySelector(".push-edit");
let EditBtn = document.querySelectorAll("#editBtn")
let exitBtn = document.querySelector('.fa-x')
let editInput = document.querySelector("#addtask")
let inputId = document.querySelector('#taskid')

EditBtn.forEach(item => {
    item.addEventListener("click", function () {
        let content = item.parentElement.parentElement.children[1].textContent.trim()
        let id = item.getAttribute("data-id");
        pushWindow.style.display = "flex";
        console.log(content,id);
        editInput.value = content;
        inputId.value = id
    })

});


exitBtn.addEventListener("click", function () {
    pushWindow.style.display = "none";
})
