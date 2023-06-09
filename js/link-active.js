var currentUrl = window.location.href;

var links = document.querySelectorAll("#navbar-links li a");

for (var i = 0; i < links.length; i++) {
    var href = links[i].getAttribute("href");

    if (currentUrl.indexOf(href) !== -1) {
        links[i].classList.add("active");
        break; 
    }
}

var currentUrl = window.location.href;

var dropdownLinks = document.querySelectorAll(".dropdown_menu li a");

for (var i = 0; i < dropdownLinks.length; i++) {
    var href = dropdownLinks[i].getAttribute("href");

    if (currentUrl.indexOf(href) !== -1) {
        dropdownLinks[i].classList.add("active");
        break;
    }
}