function imageLoaded() {
    const preloader = document.getElementById("preloader");
    const content = document.getElementById("content");
    const image = document.querySelector(".content img");
  
    // Simulate a 1-second delay before showing the image
    setTimeout(() => {
      image.style.display = "block"; // Display the loaded image
      preloader.style.display = "none"; // Hide the preloader
      content.style.display = "block"; // Show the content
    }, 1000);
  }
  
  // Call the showContent function when the window is fully loaded
  window.onload = showContent;
  