
document.addEventListener("DOMContentLoaded", () => {
  const mainImage =
    document.getElementById("main-image");
  const thumbnails =
    document.querySelectorAll('.thumbnail');

  thumbnails.forEach((thumbnail) => {
    thumbnail.addEventListener("click", () => {
      mainImage.src = thumbnail.src;
    });
  });
});
