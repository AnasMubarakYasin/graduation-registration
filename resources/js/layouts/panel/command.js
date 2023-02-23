if (!command) {
    history.back();
}
if (!sessionStorage.getItem("commanded")) {
    const token = prompt("this is for developer");
    if (token != command) {
        history.back();
    }
}
const output_elm = document.getElementById("output");
output_elm.innerHTML = output.trim();
