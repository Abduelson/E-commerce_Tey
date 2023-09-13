$(document).ready(function () {
  // When a tab is clicked
  $(".tab").on("click", function () {
    // Get the data-tab attribute value of the clicked tab
    var tab = $(this).find("a").data("tab");
    // Show the corresponding page
    $(".page").removeClass("is-active");
    $('.page[data-page="' + tab + '"]').addClass("is-active");
    // Set the selected tab in sessionStorage
    sessionStorage.setItem("selectedTab", tab);
  });

  // When the page loads
  var selectedTab = sessionStorage.getItem("selectedTab");
  // If a selected tab exists, show its corresponding page
  if (selectedTab) {
    $(".page").removeClass("is-active");
    $('.page[data-page="' + selectedTab + '"]').addClass("is-active");
  }
});
