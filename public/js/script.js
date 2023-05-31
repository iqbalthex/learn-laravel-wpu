window.onload = function() {
  const alertComponent = document.getElementById("alert");

  if (alertComponent) setTimeout(() => {
    alertComponent.classList.remove("slide-down");
    alertComponent.classList.add("slide-up");
  }, 1500);
};
