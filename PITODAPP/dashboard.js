document.addEventListener("DOMContentLoaded", function () {
    // Logout button
    document.querySelector(".logout-btn").addEventListener("click", function () {
        window.location.href = "login.html"; // Redirect to login page
    });

    // Chart.js Example
    const ctx = document.getElementById('analyticsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Activity',
                data: [100, 200, 150, 220, 300, 400, 380, 420, 500, 600, 700],
                backgroundColor: '#a00000'
            }]
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const menuItems = document.querySelectorAll(".menu-item");

    function setActiveMenu() {
        menuItems.forEach(item => {
            if (item.href === window.location.href) {
                item.classList.add("active");
            } else {
                item.classList.remove("active");
            }
        });
    }
    setActiveMenu();
});

