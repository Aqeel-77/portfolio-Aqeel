const btn = document.getElementById("theme-toggle");
const root = document.documentElement;

const saved = localStorage.getItem("theme");
if (saved === "dark") {
  root.setAttribute("data-theme", "dark");
  btn.textContent = "Light";
}

btn.addEventListener("click", function () {
  if (root.getAttribute("data-theme") === "dark") {
    root.removeAttribute("data-theme");
    localStorage.setItem("theme", "light");
    btn.textContent = "Dark";
  } else {
    root.setAttribute("data-theme", "dark");
    localStorage.setItem("theme", "dark");
    btn.textContent = "Light";
  }
});