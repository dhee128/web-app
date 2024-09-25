
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    // Validate the login credentials
    if (username === 'dhee' && password === 'dhee128') {
        // Redirect to the food.html page on successful login
        window.location.href = 'food.html';
    } else {
        alert("Invalid username or password.");
    }
});
function saveloginInfo() {
    // Handle saving child information here
    localStorage.setItem('login', 'true');
    window.location.href = 'food.html';
}
function showRecipe(food) {
    localStorage.setItem('selectedFood', food);
    window.location.href = 'nutrition.html';
}
document.addEventListener('DOMContentLoaded', function () {
    const recipeDetails = document.getElementById('recipe-details');
    if (recipeDetails) {
        const selectedFood = localStorage.getItem('selectedFood');
        if (selectedFood) {
            // Fetch and display the recipe for the selected food
            recipeDetails.innerHTML = `<h2>${selectedFood}</h2><p>Recipe details for ${selectedFood}</p>`;
        }
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const currentPage = window.location.pathname.split('/').pop();
    const menuItems = document.querySelectorAll('.navbar ul li a');

    menuItems.forEach(item => {
        if (item.getAttribute('href') === currentPage) {
            item.classList.add('active');
        }
    });
});
function register(loginForm){
    window.location.href = '../login.html?registered=true';
}
// script.js
let selectedFood = "";
function showRecipe(food) {
    selectedFood = food;
    document.getElementById('recipeButton').style.display = 'block';
}
function viewRecipe() {
    if (selectedFood) {
        window.location.href = `recipe.html?food=${selectedFood}`;
    }
}
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.getElementById("toggleIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.className = "fa fa-eye-slash";
        } else {
            passwordField.type = "password";
            toggleIcon.className = "fa fa-eye";
        }
    }





