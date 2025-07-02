// Product Details image switching logic

document.addEventListener('DOMContentLoaded', function() {
  const mainImage = document.getElementById('mainImage');
  const thumbnails = document.querySelectorAll('.thumbnail');
  if (mainImage && thumbnails.length > 0) {
    thumbnails.forEach(thumb => {
      thumb.addEventListener('click', function() {
        mainImage.src = this.src;
        thumbnails.forEach(t => t.classList.remove('ring-2', 'ring-blue-500', 'scale-105'));
        this.classList.add('ring-2', 'ring-blue-500', 'scale-105');
      });
    });
  }
}); 