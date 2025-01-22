// Tomo los elementos del HTML
const nombre = document.querySelector("#nombre");
const btnComenzar = document.querySelector("#comenzar");

// Lista de palabras ofensivas
const palabrasOfensivas = [
    "idiota", "tonto", "imbecil", "estupido", "racista", "nazi", "asco", "mierda",
    "puto", "puta", "cabron", "maldito", "baboso", "negro", "gay", "marica",
    "perra", "cerdo", "inutil", "diablo", "tarado", "zorra"
];

btnComenzar.addEventListener("click", () => {
    const nombreIngresado = nombre.value.trim(); // Elimina lo espacios al inicio y al final

    if (nombreIngresado === "") {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Por favor, ingresa un nombre."
        });
        return;
    }

    if (nombreIngresado.length > 12) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El nombre no puede tener más de 12 caracteres."
        });
        return;
    }

    // Detecta cualquier palabra ofenciva agregada en el arreglo, no importa si esta en mayusculas o minusculas
    if (palabrasOfensivas.some(palabra => nombreIngresado.toLowerCase().includes(palabra))) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El nombre ingresado contiene palabras ofensivas. Por favor, ingresa un nombre válido."
        });
        return;
    }

    localStorage.setItem("nombre", nombreIngresado);
    localStorage.setItem("puntaje-total", 0);
    localStorage.removeItem("categorias-jugadas");
    localStorage.setItem("categoria-actual", "sinLogin")

    location.href = "/jugar/invitado/trivia";
});
